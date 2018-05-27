<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Message;
use Auth;

class MessageController extends Controller
{
    //This is to display the list of messages in an admin/user where read or unread
    public function index() {}
    public function compose($id = null) {
    	if ($id) {
	    	if($id != Auth::user()->id) {
	    		$to = User::where('id', $id)->first()->email;
	    		$from = "ADMIN";
	    		$subject = "List of Documents not approved and Reason why";
	    	}
	    	else{
	    		$to = "ADMIN";
	    		$from = User::where('id', $id)->first()->email;
	    		$subject = NULL;
	    	}
    	}
    	else {
    		$to = NULL;
    		$from = "ADMIN";
	    	$subject = NULL;
    	}
    	return view('message-compose', compact('to', 'from', 'subject'));
    }
    public function read($id) {
    	$message = Message::find($id);
    	$message->status = 1;
    	$message->save();
    	return view('message-read', compact('message'));
    }

    public function sendByAdmin() {
    	$message = new Message;
    	$userId = $request->user_id;
    	$message->to = $request->to;
    }

    public function sendByUser() {
    	$message = new Message;
    	$userId = $request->user_id;
    	$message->to = $request->to;
    }


    public function reply($messageId) {
    	// ....
    }

    public function send(Request $request){
    	$message = new Message;
    	$message->subject = $request->subject;
    	$message->text = $request->text;
    	$message->to = $request->to;
    	$message->from = $request->from;
    	$isMessageSaved = $message->save();
    	if ($isMessageSaved) { 
    		return redirect('/message/response')->with(['message' => 'Your message has been successfully sent. Click on the ouside of this box to close it', 'style'=>'text-success']);
    	}
    	else {
    		return redirect('/message/response')->with(['message' => 'Ooops... Something went wrong. Click on the ouside of this box to close it', 'style'=>'text-danger']);
    	}
    }

    public function responsePage() {
    	return view('message-response');
    }
}
