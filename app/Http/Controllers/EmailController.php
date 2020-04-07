<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EmailSent;

class EmailController extends Controller
{
    public function sendEmail(Request $request) {

        $valueArray = [
        	'name' => 'John',
        ];

        try {
            \Mail::to('binarybee.solutions@gmail.com')->send(new EmailSent($valueArray));
            return redirect()->back()->with('status','OK!');
        } catch (\Exception $e) {
            return redirect()->back()->with('status','Error: '.$e);
        }
        
    }
}
