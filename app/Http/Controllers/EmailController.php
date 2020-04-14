<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\EmailSent;
use Validator;
use App\Documents;
use App\SentDocs;
use App\User;
use App\DocTypes;

class EmailController extends Controller
{
    public function sendEmail(Request $request) {

        $validator = Validator::make($request->all(), [
            'contacts' => 'required',
            'type' => 'required',
            'control_no' => 'required',
            'doc_date' => 'required',
            'subject' => 'required',
            'originator' => 'required',
            'file' => 'required|mimes:pdf,PDF'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $file = $request->file('file');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('/uploads');
        $file->move($destinationPath,$filename);

        $document = new Documents;
        $document->type = $request->type;
        $document->no = $request->no;
        $document->control_no = $request->control_no;
        $document->doc_date = $request->doc_date;
        $document->subject = $request->subject;
        $document->originator = $request->originator;
        $document->filename = $filename;
        $document->uploaded_by = Auth::User()->emp_id;
        $document->SAVE();
        
        $contacts = $request->contacts;
        $cc=array();
        foreach($contacts as $k => $contact) {
            $send = new SentDocs;
            $send->document_id = $document->id;
            $send->receiver_id = User::WHERE('email',$contact)->FIRST()->emp_id;
            $send->SAVE();
            if($k>0)
                array_push($cc,$contact);
        }
        \Mail::to($request->contacts[0])
            ->cc($cc)
            ->send(new EmailSent($document));
        
            return redirect()->back()->with('status','Message has been successfully sent!');
        // try {

        //     \Mail::to('binarybee.solutions@gmail.com')->send(new EmailSent($document));
        //     return redirect()->back()->with('status','OK!');
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('status','Error: '.$e);
        // }
        
    }
}
