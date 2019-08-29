<?php
/**
 * Created by IntelliJ IDEA.
 * User: luwei
 * Date: 2017/12/20
 * Time: 13:48
 */

namespace app\modules\mch\models;

use app\hejiang\Cloud;

class WxdevToolPreviewForm extends MchModel
{
    public $store_id;
    public $appid;
    public $branch;

    public function rules()
    {
        return [
            [['store_id', 'appid'], 'trim'],
            [['store_id', 'appid'], 'required'],
        ];
    }

    public function getResult()
    {
        if (!$this->validate()) {
            return $this->errorResponse;
        }
        $token = \Yii::$app->session->get('wxdev_token');
        $api_root = \Yii::$app->urlManager->scriptUrl . "?store_id={$this->store_id}&r=api/";
        $url = Cloud::$cloud_server_prefix . Cloud::$cloud_server_host . '/api/mall/wxdev-tool-preview';
        $curl = Cloud::apiGet($url, [
            'api_root' => $api_root,
            'appid' => $this->appid,
            'token' => $token,
            'branch' => $this->branch,
        ]);
        if ($curl->http_status_code != 200) {
            return [
                'code' => 1,
                'msg' => '请求出错：' . $curl->error_message,
                'data' => $curl->response,
            ];
        }
        return $curl->response;
    }
}
