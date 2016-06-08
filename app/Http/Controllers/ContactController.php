<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMeRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * 显示表单
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showForm() {
        return view('blog.contact');
    }

    public function sendContactInfo(ContactMeRequest $request) {
        $data=$request->only('name','email','phone');
        $data['messageLines']=explode("\n",$request->get('message'));
        Mail::send('emails.contact',$data,function ($message) use ($data){
           $message->subject('来自'.$data['name'].'的留言')
               ->to(config('blog.contact_email'))
               ->replyTo($data['email']);
        });
        return back()
            ->withSuccess('谢谢你的留言，已经发送成功！');
    }

}
