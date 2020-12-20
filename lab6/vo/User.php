<?php


class User
{
    private $id;

    private $password;

    private $nickName;

    private $trueName;

    private $email;

    private $telephone;

    private $address;

    /**
     * @param $attributeName  "id, password nickName,trueName,email,telephone,address中选择"
     * @param $value  为要设置的值
     */
    public function __set($attributeName,$value){
        switch ($attributeName){
            case 'id':
                $this->id=$value;
                break;
            case 'password':
                $this->password=$value;
                break;
            case 'nickName':
                $this->nickName=$value;
                break;
            case 'trueName':
                $this->trueName=$value;
                break;
            case 'email':
                $this->email=$value;
                break;
            case 'telephone':
                $this->telephone=$value;
                break;
            default:
                $this->address=$value;
        }

    }

    /**
     * @param $attributeName   "id, password nickName,trueName,email,telephone,address中选择"
     * @return mixed method get
     */
    public function __get($attributeName){
        switch ($attributeName){
            case 'id':
                return $this->id;
            case 'password':
                return $this->password;
            case 'nickName':
                return $this->nickName;
            case 'trueName':
                return $this->trueName;
            case 'email':
                return $this->email;
            case 'telephone':
                return $this->telephone;
            default:
                return $this->address;
        }
    }
}