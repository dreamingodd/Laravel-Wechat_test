<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class WechatController extends Controller
{
    /**
    * 处理微信的请求消息
    * authentication and user post data recipient.
    * @return string
    */
   public function serve()
   {
    //    Log::info('request arrived.');  注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

       $wechat = app('wechat');
       $wechat->server->setMessageHandler(function($message){
           if ($message->MsgType == 'voice') {
               return "不好意思，小探不是AlphaGo，听不懂呢！";
           }
           return "This is Casarover Laravel Wechat Test";
       });

       Log::info('------------------------return response.');

       return $wechat->server->serve();
   }
}
