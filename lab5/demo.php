<?php
class PageTool{
    protected $total = 0;
    protected $ever_page = 10;
    protected $page = 1;
    //构造函数
    public function __construct($total, $page=false, $per_page=false){
        $this->total = $total;
        if($per_page){
            $this->ever_page = $per_page;
        }
        if($page){
            $this->page=$page;
        }
    }
    //主要函数
    public function show(){
        $param = array();
        $all_page = ceil($this->total / $this->ever_page);     //得到总页数
        //获取URL中包含的信息
        $url = ($_SERVER['REQUEST_URI']);
        $parse = parse_url($url);   //分出  path   query 两个数组类型
        if(isset($parse['query'])){
            parse_str($parse['query'],$param);
        }
        unset($param['page']);
        $url = $parse['path'].'?';
        //输出URL中的信息
        if(!empty($param)){
            $param = http_build_query($param);
            $url = $url.$param;
            echo "当前URL中的信息".$url,"<br/>";
        }
        $nav = array();
        $nav[] = '<h1 class="page_now">现在是第' . $this->page .'页</h1>';
        array_unshift($nav,'<a href="'.$url.'page=1">首页</a>');//放到数组的开头
        array_unshift($nav,'<a href="'.$url.'page='.$this->page>1?($this->page-1):1 .'">上一页</a>');
        array_push($nav,'<a href="'.$url.'page='.$this->page<$this->total? $this->page+1:$this->total.'">下一页</a>');
        array_push($nav,'<a href="'.$url.'page='.$this->total.'">尾页</a>');
        return implode('',$nav);
    }

}
//测试
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$p = new PageTool(80,$page,5);  //总共80个商品，当前为第2页，每页6条商品
echo $p->show();



