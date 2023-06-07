<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;
  
class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $mailData = [
            'title' => 'Mail from Kirill',
            'body' => 'This is for testing email using smtp.'
        ];
         
        Mail::to('zagulkirill@gmail.com')->send(new DemoMail($mailData));
           
        // dd("Email is sent successfully.");
        return response()->json([
            'status' => 200,
            'result' => 'Email is sent successfully.'
         ], 200);
    }

    // Отправка заявки на услугу
    public function serviceRequest() {
        return response()->json([
            'status' => 200,
            'result' => 'Email is sent successfully.'
         ], 200);
    }


    // Отправка сообщения в учреждение

    public function institutionMessage() {
        return response()->json([
            'status' => 200,
            'result' => 'Email is sent successfully.'
         ], 200);
    }
}