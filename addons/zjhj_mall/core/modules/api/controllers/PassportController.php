<?php
/**
 * Created by IntelliJ IDEA.
 * User: luwei
 * Date: 2017/6/24
 * Time: 22:31
 */

namespace app\modules\api\controllers;

use app\models\User;
use app\modules\api\models\LoginForm;
use app\modules\api\models\LoginFormMobile;
use app\modules\api\models\SmsMobileRecord;
use app\utils\Sms;

class PassportController extends Controller
{
    private $ErrorData = array(
        "0"     =>  "",
        "1"     =>  "",
        "2"     =>  "",
        "101"   =>  "手机号格式不正确",
        "102"   =>  "密码格式不正确",
        "103"   =>  "手机号或密码错误",
        "104"   =>  "注册失败",
        "105"   =>  "密码修改失败",
        "106"   =>  "该手机号已被注册",
        "107"   =>  "请输入手机号",
        "200"   =>  "短信发送成功",
        "201"   =>  "短信验证成功",
        "202"   =>  "短信发送失败",
        "203"   =>  "短信验证失败",
        "204"   =>  "您今日已发短信到达上线！",
        "205"   =>  "请输入短信验证码",
        "206"   =>  "请勿频繁发送短信",
        "207"   =>  "短信通知服务未开启",
        "208"   =>  "未设置验证码短信",

    );
    //对返回数据进行封装

    /**
     * @param $code 状态码
     * @param array $body 内容
     * @param string $msg 提示信息,不手动设置就走默认状态码提示
     * @return array
     */
    public function ResultReturn($code,$body = array(),$msg='')
    {
        $result = array();
        $result['code'] = strval($code);
        if(!$msg){
            $result['mesg'] = $this->ErrorData[$code];
        }else{
            $result['mesg'] = $msg;
        }
        $result['body'] = $body;
        return $result;
    }

    public function actionLogin()
    {
        $form = new LoginForm();
        $form->attributes = \Yii::$app->request->post();
        $form->wechat_app = $this->wechat_app;
        $form->store_id = $this->store->id;
        if(\Yii::$app->fromAlipayApp()) {
            return $form->loginAlipay();
        } else {
            return $form->login();
        }
    }
    //登录
    public function actionLoginByMobile()
    {
        $body=array();
        $form = new LoginFormMobile();
        $contact_way = \Yii::$app->request->post('contact_way');
        $password    = \Yii::$app->request->post('password');
        $preg_phone = "/^1[23456789]\d{9}$/";
        $preg_pw    = "/^[A-Za-z0-9]{6,20}$/";
        if(!preg_match($preg_phone,$contact_way)){//验证手机号
            return $this->ResultReturn(101);
        }
        if(!preg_match($preg_pw,$password)){//验证密码
            return $this->ResultReturn(102);
        }
        $result=$form->searchOne($contact_way,$password);
        // print_r($result);die;
        if($result['code']==0){
            $body=array(
                'list'=>$result['data'],
            );
            return $this->ResultReturn(0,$body);
        }else{
            return $this->ResultReturn(103);
        }
    }
    //注册
    public function actionRegister()
    {
        $body=array();
        $form = new LoginFormMobile();
        $contact_way = \Yii::$app->request->post('contact_way');
        $password    = \Yii::$app->request->post('password');
        $vcode       = \Yii::$app->request->post('vcode');
        $preg_phone = "/^1[23456789]\d{9}$/";
        $preg_pw    = "/^[A-Za-z0-9]{6,20}$/";
        if(!preg_match($preg_phone,$contact_way)){//验证手机号
            return $this->ResultReturn(101);
        }
        if(!preg_match($preg_pw,$password)){//验证密码
            return $this->ResultReturn(102);
        }
        $result=$form->register($contact_way,$password);
        print_r($result);die;
        if($result['code']==0){
            $body=array(
                'id'=>$result['data'],
            );
            return $this->ResultReturn(0,$body);
        }elseif($result['code']==400){
            return $this->ResultReturn(104);
        }elseif($result['code']==400){
            return $this->ResultReturn(104);
        }
    }
    //找回密码
    public function actionForgetPassword()
    {
        
        $body=array();
        $form = new LoginFormMobile();
        $contact_way = \Yii::$app->request->post('contact_way');
        $password    = \Yii::$app->request->post('password');
        $preg_phone = "/^1[23456789]\d{9}$/";
        $preg_pw    = "/^[A-Za-z0-9]{6,20}$/";
        if(!preg_match($preg_phone,$contact_way)){//验证手机号
            return $this->ResultReturn(101);
        }
        if(!preg_match($preg_pw,$password)){//验证密码
            return $this->ResultReturn(102);
        }
        $result=$form->forgetPassword($contact_way,$password);

        if($result['code']==0){
            $body=array(
                'id'=>$result['data'],
            );
            return $this->ResultReturn(0,$body);
        }elseif($result['code']==400){
            return $this->ResultReturn(105);
        }elseif($result['code']==401){
            return $this->ResultReturn(103);
        }
    }


    //获取短信验证码
    public function actionGetCode(){

        $form = new Sms();
        $contact_way = \Yii::$app->request->post('contact_way');
        $preg_phone = "/^1[23456789]\d{9}$/";
        if(!preg_match($preg_phone,$contact_way)){//验证手机号
            return $this->ResultReturn(101);
        }
        
        $sign='有商互联';
        $code = mt_rand(100000, 999999);
        $content="验证码".$code."，您正在注册成为新用户，感谢您的支持！";
        $result=$form->send_code_text($sign, $code, $contact_way);
        print_r($result);die;
        if($result['code']==0){
            return $this->ResultReturn(0);
        }elseif($result['code']==2){
            return $this->ResultReturn(2,[],$result['msg']);
        }else{
            return $this->ResultReturn($result['code']);
        }
    }
    //验证手机验证码 ajax调用
    public function actionCheckValcode(){
        $mobile = \Yii::$app->request->post('contact_way');
        $valcode = \Yii::$app->request->post('valcode');
        $smsRecord = new SmsMobileRecord();
        $result=$smsRecord->getMobileCode($mobile,$valcode);
        if($result){
            return $this->ResultReturn(0);
        }else{
            return $this->ResultReturn(203);
        }
    }
}
