<?php
/**
 * 条件查询下拉选择框 根据学院查询
 * Ajax
 */
echo "<div class=\"searchCondition\">";
  echo " <label>";
    echo "   <select  id=\"ins\" name=\"s\"  onchange=\"run()\">";
        echo "   <option>请选择</option>";
            $insDao=new StructDAO();
            if(false!==$insDao->getInstituteName()){
                $insArray=$insDao->getInstituteName();
                foreach($insArray as $ins){
                    $insID=$ins->instituteID;
                    echo "<option value=\"$ins->instituteID\">$ins->instituteName</option>";
                }
            }
        echo "</select>";
    echo "</label>";
echo "</div>";