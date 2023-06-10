<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;
use App\Mail\ModeratorVerificationMail;
use Illuminate\Routing\Controller as BaseController;
  
class MailController extends BaseController
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function demoMail(Request $request)
    {
        if($request){
            $title = $request->title;
            $body = $request->body;
            $email = $request->email;
        }

        $mailData = [
            'title' => $title,
            'body' => $body,
            'email' => $email
        ];

        Mail::to($email)->send(new DemoMail($mailData));
        
        return response()->json([
            'status' => 200,
            'result' => 'Email is sent successfully.'
         ], 200);
    }

    // Ожидание подтверждения модератора
    public function moderatorVerificationWaitMail(Request $request)
    {
        if($request){
            $title = $request->title;
            $body = $request->body;
            $email = $request->email;
        }

        $mailData = [
            'title' => $title,
            'body' => $body,
            'email' => $email
        ];

        Mail::to($email)->send(new ModeratorVerificationMail($mailData));

        return response()->json([
            'status' => 200,
            'result' => 'Email is sent successfully.'
         ], 200);
    }

    // Подтверждение модератора
    public function moderatorVerificationMail(Request $request)
    {
        if($request){
            $title = $request->title;
            $body = $request->body;
            $email = $request->email;
        }

        $mailData = [
            'title' => $title,
            'body' => $body,
            'email' => $email
        ];

        Mail::to($email)->send(new ModeratorVerificationMail($mailData));

        return response()->json([
            'status' => 200,
            'result' => 'Email is sent successfully.'
         ], 200);
    }

    // Отправка сообщения в учреждение
    public function institutionMessageMail() {
        return response()->json([
            'status' => 200,
            'result' => 'Email is sent successfully.'
         ], 200);
    }

    // Ответ на сообщения учреждением
    public function institutionMessageAnswerMail() {
        return response()->json([
            'status' => 200,
            'result' => 'Email is sent successfully.'
         ], 200);
    }

    // Отправка заявки на услугу
    public function serviceRequestMail() {
        return response()->json([
            'status' => 200,
            'result' => 'Email is sent successfully.'
         ], 200);
    }

    // Ответ на заявку на услугу
    public function serviceRequestAnswerMail() {
        return response()->json([
            'status' => 200,
            'result' => 'Email is sent successfully.'
         ], 200);
    }

    // Техподдержка
    public function techMail(Request $request)
    {
        if($request){
            $title = $request->title;
            $body = $request->body;
            $email = $request->email;
        }

        $mailData = [
            'title' => $title,
            'body' => $body,
            'email' => $email
        ];

        Mail::to($email)->send(new DemoMail($mailData));
           
        return response()->json([
            'status' => 200,
            'result' => 'Email is sent successfully.'
         ], 200);
    }

    // Ответ от техподдержки
    public function techAnswerMail(Request $request)
    {
        if($request){
            $title = $request->title;
            $body = $request->body;
            $email = $request->email;
        }

        $mailData = [
            'title' => $title,
            'body' => $body,
            'email' => $email
        ];

        Mail::to($email)->send(new DemoMail($mailData));
           
        return response()->json([
            'status' => 200,
            'result' => 'Email is sent successfully.'
         ], 200);
    }
}