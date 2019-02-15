<?php

namespace App\Http\Controllers;
use App\Repositories\Admin\CheckRepository as Check;
use App\Repositories\Hotel\OrderRepository as Order;
use App\WebService\HotelService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use SoapClient;
use SoapServer;

/**
 * 微信服务通讯.
 */
class SoapController extends Controller
{

    /**
     * @var $check
     */
    protected $check;

    /**
     * @var $order
     */
    protected  $order;

    public function __construct(Check $check,Order $order)
    {
        $this->check = $check;
        $this->order = $order;
    }

    public function webservice(Request $request)
    {
        $wsdl = "http://xiajia.tunnel.senthink.com/soap/webservice?wsdl";
        return $this->serve($request,$wsdl,HotelService::class,array(
            "uri"      => "Reservation"
        ));
    }


    /**
     * 通用SOAP服务提供
     * @param $request
     * @param $wsdl
     * @param $class
     * @param $service
     * @param array $params
     * @return mixed
     * @throws \App\Services\Exception
     */
    public function serve($request,$wsdl,$class,$params = array()){
        if($request->getMethod() == 'GET'){
            if(isset($_SERVER['QUERY_STRING'])) {
                $qs = $_SERVER['QUERY_STRING'];
            }elseif(isset($HTTP_SERVER_VARS['QUERY_STRING'])) {
                $qs = $HTTP_SERVER_VARS['QUERY_STRING'];
            }else{
                $qs = '';
            }

            if(preg_match('/wsdl/', $qs)){
                $result = file_get_contents(app_path('WebService/Wsdl/hotel.wsdl'));
                return response($result)->header('Content-Type', 'text/xml');
            }
        }else {
            if(is_null($wsdl) && !array_key_exists('uri',$params)){
                exit('非WSDL模式下必须传入uri');
            }

            $server=new SoapServer($wsdl,$params);

            $server->setClass($class,$this->check,$this->order);

                $response = new Response();
                $response->headers->set("Content-Type","text/xml; charset=utf-8");

                ob_start();
                $server->handle();
                $response->setContent(ob_get_clean());

                return $response;
        }
    }


    // 接口调用示例
    public function test()
    {

        $order_no = 'CX201702151555150850';
        
        $order = $this->order->with(array('hotel','room','user'))->findBy('order_no',$order_no);

        $check = $this->check->findBy("order_no",$order['order_no']);


        $client=new \SoapClient(config('hotel.pms.wsdl'));

        $param=array(
            'WeChatHotelId' => $order->hotel_id,
            'WeChatRoomTypeId' => $order->room_id,
            'OrderNumber' => $order->order_no,
            'Out_order_no' => $check->out_order_no,
            'RoomNo' => $check->room_no,
        );

        $result = $client->AllCheckOut($param)->AllCheckOutResult;
        //$result = $client->InsertReservation($param)->InsertReservationResult;
    }
}
