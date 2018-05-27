<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tip;
use App\User;
use App\Document;
use App\Notification;
use App\Message;
use Auth;

class AdminController extends Controller
{
    //
    public function edit($id) {
    	
    }

    public function dashboard() {
        $tipsCount = Tip::count();
        $messageCount = Message::count();
        $newWhistlesCount = Notification::where('status', 0)->count();
        $successfulReport = Tip::where('successful', 1)->count();
        return view('dashboard', compact('tipsCount', 'messageCount', 'newWhistlesCount', 'successfulReport'));
    }

    public function view($id) {
        $tip = Tip::where('id', $id)->first();
        $tip = Tip::find($id);
        $tip->attended = 1;
        $tip->save();
        $user = User::where('id', $tip->user_id)->first();
        $documentObject = Document::where('tip_id', $id);
        $documents = $documentObject->get();
        $noOfDocumentsUploaded = $documentObject->count(); //->where('user_id', $userId)
        return view('admin-tips-view', compact('tip', 'noOfDocumentsUploaded', 'documents', 'user'));

    }

    public function newWhistles() {
        $tips = Tip::where('attended', 0)->get();
        return view('admin-tip-list', compact('tips'));

    }

    public function OldWhistles() {
        $tips = Tip::where('attended', 1)->get();
        return view('admin-tip-list', compact('tips'));

    }
    public function successfulWhistles() {
        $tips = Tip::where('successful', 1)->get();
        return view('admin-tip-list', compact('tips'));

    }

    public function notifications(){
        $notifications = Notification::where('to', NULL)->get();
        return view('admin-notification', compact('notifications'));
    }

    public function readNotification($id) {
        $notification = Notification::find($id);
        $notification->status = 1;
        $notification->save();
        if($notification) {
            return redirect($notification->link);
        }
    }

    public function oldMessages(){
        $messages = Message::where('status', 1)->get();
        return view('admin-message-list', compact('messages'));
    }
    public function newMessages(){
        $messages = Message::where('status', 0)->get();
        return view('admin-message-list', compact('messages'));
    }

    public function markSuccessful(Request $request){
        $id = $request->id;
        $tip = Tip::find($id);
        $tip->successful = 1;
        $tip->save();
        $cut = $tip->amount * 0.05;
        $user = User::where('id', $tip->user_id)->first();
        $message = new Message;
        $message->subject = "Investigation Successful";
        $message->to = $user->email;
        $message->from = "ADMIN";
        $message->text = "Your tip has birth a successful investigation Thanks for the work you will recieve ". $cut. " which is 5% of the amount.<br> Please enter your information is this format:<br>Account Name<br>Account Number<br>Bank Name";
        $message->save();
        return redirect()->back()->with(['message' => 'A message will be sent to inform the Tip Giver of the success of the investigation carried out', 'style'=> 'success']);

    }
    public function markRedundant(Request $request){
        $id = $request->id;
        $tip = Tip::find($id);
        $tip->successful = 2;
        $tip->save();
        $cut = $tip->amount * 0.05;
        $user = User::where('id', $tip->user_id)->first();
        $message = new Message;
        $message->subject = "Investigation Redundant";
        $message->to = $user->email;
        $message->from = "ADMIN";
        $message->text = "Hi $user->firstname, We have not been able to reach a accurate ..... on your tip";
        $message->save();
        return redirect()->back()->with(['message' => 'A message will be sent to inform the Tip Giver on the progress of the tip', 'style'=> 'success']);
    }

    public function regularUsers() {
        $users = User::where('role','regular')->get();
        return view('admin-user-list',compact('users'));
    }
    public function adminUsers() {
        $users = User::where('role','admin')->get();
        return view('admin-user-list',compact('users'));
    }

    public function makeAdmin($id) {
        $user = User::find($id);
        $user->role = "admin";
        $user->save();
        return redirect()->back()->with(['message' => "$user->firstname with $user->email has been made an Admin", 'style'=> 'success']);
    }
}
