<?php
declare (strict_types = 1);

namespace app\tlms\controller;

use app\BaseController;
use app\model\RoleModel;
use app\model\UserModel;
use think\Request;

class Login extends BaseController
{
    static $code = 0;
    static $msg = "";
    static $data = [];
    public function Login(Request $request)
    {

        if($request ->isPost()){
//            error_log(json_encode($request ->post()));
//            echo returnJson(self::$code, self::$msg, self::$data);die;

            $user = new UserModel();
            $data = $request ->post();
            if (isset($data['username']) && isset($data['passwd']) && !empty($data['username']) && !empty($data['passwd'])){
                $result = $user -> getUser($data['username'],$data['passwd']);
                if (is_array($result)){
                    $role = new RoleModel();
                    $where["id"] = $result['rid'];
                    $result['nickname'] = $role -> getField($where, "name");
                    unset($result['password']);
                    unset($result['create_date']);
                    unset($result['login_date']);
                    unset($result['status']);
                    self::$msg = "查询成功";
                    self::$code = 0;
                    self::$data = $result;
                    echo returnJson(self::$code, self::$msg, self::$data);exit();
                }else{
                    self::$msg = $result;
                    self::$code = -1;
                    echo returnJson(self::$code, self::$msg, self::$data);exit();
                }
            }else{
                self::$msg = "请认真填写账号密码";
                self::$code = -2;
                echo returnJson(self::$code, self::$msg, self::$data);exit();
            }
        }else{
            self::$msg = "数据有误";
            self::$code = -3;
            echo returnJson(self::$code, self::$msg, self::$data);exit();
        }
    }
}
