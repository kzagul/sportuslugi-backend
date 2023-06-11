<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;
use App\Mail\ModeratorVerificationMail;
use App\Mail\ModeratorVerificationWaitMail;
use App\Mail\InstitutionMessageMail;
use App\Mail\serviceRequestMail;

use App\Mail\TechMail;
use App\Mail\techAnswerMail;

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
            $email = $request->userEmail;
            $userName = $request->userName;
            $institutionName = $request->institutionName;
        }

        $mailData = [
            'email' => $email,
            'userName' => $userName,
            'institutionName' => $institutionName
        ];

        Mail::to($email)->send(new ModeratorVerificationWaitMail($mailData));

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
    public function institutionMessageMail(Request $request) 
    {

        if($request){
            $topic = $request->topic;
            $phone = $request->phone;
            $body = $request->body;
            $email = $request->email;
        }

        $mailData = [
            'topic' => $topic,
            'phone' => $phone,
            'body' => $body,
            'email' => $email
        ];

        Mail::to($email)->send(new InstitutionMessageMail($mailData));

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
    public function serviceRequestMail(Request $request) {

        if($request){
            $name = $request->name;
            $gender = $request->gender;
            $age = $request->age;
            $title = $request->title;
            $phone = $request->phone;
            $emailUser = $request->emailUser;
            $emailInstitution = $request->emailInstitution;
            $serviceName = $request->serviceName;
            $serviceLink = $request->serviceLink;
            $body = $request->body;
        }

        $mailData = [
            'name' => $name,
            'gender' => $gender,
            'age' => $age,
            'title' => $title,
            'phone' => $phone,
            'emailUser' => $emailUser,
            'emailInstitution' => $emailInstitution,
            'serviceName' => $serviceName,
            'serviceLink' => $serviceLink,
            'body' => $body,
        ];

        // Mail::to($email)->send(new serviceRequestMail($mailData));
        Mail::to($emailInstitution)->send(new serviceRequestMail($mailData));
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

        // sportuslugi.tech@ya.ru
        Mail::to('sportuslugi.tech@ya.ru')->send(new TechMail($mailData));
        // Mail::to($email)->send(new TechMail($mailData));
           
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

        Mail::to($email)->send(new techAnswerMail($mailData));
           
        return response()->json([
            'status' => 200,
            'result' => 'Email is sent successfully.'
         ], 200);
    }
}