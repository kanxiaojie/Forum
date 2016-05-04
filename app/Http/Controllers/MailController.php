<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send()
    {
        $name = 'kxj003';
        $flag = Mail::send('emails.test', ['name' => $name], function($message){
            $to = '767184665@qq.com';
            $message->to($to)->subject('测试邮件');

            $attachment = storage_path('app/files/LaravelAcademy.doc');
            $message->attach($attachment, ['as' => "=?UTF-8?B?".base64_encode('测试文档')."?=.doc"]);
        });

        //纯文字测试
//        $flag = Mail::raw('这是一份测试邮件', function($message){
//            $to = '767184665@qq.com';
//            $message->to($to)->subject('测试邮件');
//        });


        if($flag){
            echo '发送邮件成功，请查收！';
        }else{
            echo '发送邮件失败，请重试！';
        }
    }
}
