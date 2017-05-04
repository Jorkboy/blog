<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017-03-27
 * Time: 13:30
 */

namespace Back\Model;

use Think\Model;

class LoginModel extends Model
{
    protected $trueTableName    =   'admin';

    public function checkPass($input)
    {
        $res = $this->where(['phone' => $input['phone']])->find();
        if($res && $res['password'] == md5($res['pass_salt'] . $input['password'])){
            return $res;
        }else{
            return false;
        }
    }
}
