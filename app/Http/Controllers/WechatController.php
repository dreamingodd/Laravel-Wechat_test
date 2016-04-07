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
           return "欢迎来到最有逼格的民宿文化社群！\n\n"
                 ."探庐者（Casa Rover），带你探访远方的家，让心灵去旅行，寻找你梦中的那一片纯净之地。"
                 ."我们在寻找米其林殿堂级的民宿，它能给人以无尽的想象空间，仿佛是行云流水的云彩，"
                 ."亦或者是层峦叠嶂的山脉，代表着超脱飘然的悠闲自在和天马行空的无拘无束。\n\n"
                 ."探庐者，他是一种探索发现美的意境，他更是一种返璞归真的生活态度，还原民宿最本质的内涵和文化，"
                 ."将最生动细腻的民宿特质带给热爱生活、热爱旅行的你。\n\n"
                 ."合作/推广请加探庐君微信：sonoffeng 备注民宿。";
       });

       Log::info('------------------------return response.');

       return $wechat->server->serve();
   }
}
