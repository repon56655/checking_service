<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckingController extends Controller
{
    //
    public function index(){
        return view("index");
    }

    public function customer_email_checker(Request $request){

        $email = $request->email;
        list($user, $domain) = explode('@', $email);
        $mxRecords = dns_get_record($domain, DNS_MX);
        $record_length = count($mxRecords);
        if($record_length > 2){
            return response()->json(
                [
                    'mxRecords' => $mxRecords,
                    //'message' => "This Email is Valid",
                ]
            );
        }
        else{
            return response()->json(
                [
                    'mxRecords' => $mxRecords,
                    //'message' => "This Email is not Valid",
                ]
            );
        }


    }
}
