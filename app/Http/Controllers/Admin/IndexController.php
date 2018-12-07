<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/7
 * Time: 16:55
 */

namespace App\Http\Controllers\Admin;


use App\Repositories\Admin\DeviceRepository;
use App\Repositories\Admin\UserDeviceRepository;
use Cncal\Getui\Facades\Getui;


class IndexController extends BaseController
{
    protected $device;
    protected $user_device;

    public function __construct(DeviceRepository $device, UserDeviceRepository $user_device)
    {
        parent::__construct();
        $this->device = $device;
        $this->user_device = $user_device;
    }

    public function index(){
        dd(getenv('env'));
//        $info = $this->device->all();
//        foreach ($info as $v){
//            $this->redis->hMSet('device:'.$v->dev_mac, $v->toArray());
//        }
//
//        $info = $this->user_device->findWhere([
//            'is_bind' => 1,
//            'type' => 1
//        ]);
//        foreach ($info as $v){
//            $this->redis->hSet('dev_user', $v->dev_mac, $v->user_id);
//        }

        Getui::pushMessageToSingle([
            'template_type' => 1,
            'template_data' => [
                'transmission_type' => 2,               // 是否立即启动应用：1 立即启动 2 等待客户端自启动，必填
                'transmission_content' => '1',        // 透传内容，不支持转义字符，string(2048), 必填
                'title' => trans('log.user.operation.title'),    // 通知标题，string
                'text' => '12345',                        // 通知内容，string
            ],
            'cid' => 'ff33ab27e9b2a98a296a7d82e05a8b6d',                              // 推送通知至指定用户时填写
        ]);
    }

}