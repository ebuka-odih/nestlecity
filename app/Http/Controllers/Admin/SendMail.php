<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMail extends Controller
{
    //
    public function sendmail()
    {
        return view('admin.send-mail');
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('images'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName);
            $msg = 'Image successfully uploaded';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;

            $sendmsg = new \App\Sendmail();
            $sendmsg->email = $request->get('email');
            $sendmsg->subject = $request->get('subject');
            $sendmsg->message = $request->get('message');
            Mail::to($sendmsg->email)->send(new SendMessage($sendmsg));
            $sendmsg->save();
            return redirect()->back()->with('success', "Message Sent Successfully");
        }
        $sendmsg = new \App\Sendmail();
        $sendmsg->email = $request->get('email');
        $sendmsg->subject = $request->get('subject');
        $sendmsg->message = $request->get('message');
        Mail::to($sendmsg->email)->send(new SendMessage($sendmsg));
        $sendmsg->save();
        return redirect()->back()->with('success', "Message Sent Successfully");

    }

}
