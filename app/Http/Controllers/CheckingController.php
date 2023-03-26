<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class CheckingController extends Controller
{
    //
    public function index(){
        return view("index");
    }

    // public function customer_email_checker(Request $request){

    //     $email = $request->email;
    //     list($user, $domain) = explode('@', $email);
    //     $mxRecords = dns_get_record($domain, DNS_MX);
    //     $record_length = count($mxRecords);
    //     if($record_length > 2){
    //         return response()->json(
    //             [
    //                 'mxRecords' => $mxRecords,
    //                 //'message' => "This Email is Valid",
    //             ]
    //         );
    //     }
    //     else{
    //         return response()->json(
    //             [
    //                 'mxRecords' => $mxRecords,
    //                 //'message' => "This Email is not Valid",
    //             ]
    //         );
    //     }

    // }

    public function send_mail(Request $request){
        // dd($request->all());
        $request->all();

        $name = $request->name;
        $phone = $request->phone;
        $address = $request->address;
        $mail_address = "nuruddinriponsfsf2a@gmail.com";

        // dd(Mail::to($mail_address)->send(new SendMail($name, $phone, $address)));
        Mail::to($mail_address)->send(new SendMail($name, $phone, $address));

        if (sizeof(Mail::failures())>0) {
            $all_failled_email = "";
            foreach(Mail::failures() as $failled_email) {
                $all_failled_email .= $failled_email.",";
             }
            return response()->json(
                [
                    'message' => trim($all_failled_email,",")."Email Not Sent Successfully",
                ]
            );
        }
        else{
            return response()->json(
                [
                    'message' => "Email Sent Successfully",
                ]
            );
        }





    }
}
