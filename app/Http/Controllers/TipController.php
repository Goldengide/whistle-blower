<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tip;
use App\Document;
use App\User;
use App\Message;
use App\Notification;
use Auth;

class TipController extends Controller
{
    //
    public function newtip() {
        // return view('users-tips-add');
        return view('users-tips-add');
    }

    public function dashboard() {
        $tipsCount = Tip::where('user_id', Auth::user()->id)->count();
        $messageCount = Message::where('to', Auth::user()->email)->count();
        $newWhistlesCount = Notification::where('status', 0)->where('to', Auth::user()->id)->count();
        $successfulReport = Tip::where('successful', 1)->where('user_id', Auth::user()->id)->count();
        return view('user-dashboard', compact('tipsCount', 'messageCount', 'newWhistlesCount', 'successfulReport'));
    }

    public function add(Request $request) {
        $tip = new Tip;
        $userId = Auth::user()->id;
        $user = User::where('id', $userId)->first();
        $tip->user_id = $userId;
        $tipId = Tip::count() + 1;
        $documentId = Document::where('user_id', $userId)->where('tip_id', $tipId)->count() + 1;
        $tip->type_of_organization = $request->type_of_organization;
        $tip->organization_name = $request->organization_name;
        $tip->type_of_tips = $request->type_of_tips;
        $tip->organization_address = $request->organization_address;
        $tip->organization_date = $request->organization_date;
        $tip->description = $request->description;
        $tip->conduct = $request->conduct;
        $tip->amount = $request->amount;
        $tip->document = $request->document;

        $this->validate($request, [
            'document' => 'required|image|mimes:jpeg,png,jpg|max:5048',
        ]);


        $destinationPathOfDocumentsPicture = "uploads/documets";


        // $destinationPathOfDocumentsPicture = public_path("uploads\documents");


        $document = new Document;

        $file = $request->file('document');

        $filename = $request->email ."_". $tipId ."_". $documentId . ".png";


        if($request->hasFile('document')) {
            if ($file->isValid()) {
                
                if($file->move($destinationPathOfDocumentsPicture, $filename)) {
                    $document->user_id = $userId;
                    $document->tip_id = $tipId;
                    $document->title = $request->title;
                    $document->url = $destinationPathOfDocumentsPicture."/".$filename;

                }

            }
        }
        
        $tip->lastname = $user->lastname;
        $tip->firstname = $user->firstname;
        // $tip->othernames = $request->othernames;
        $tip->phone = $user->phone;
        $tip->email = $user->email;
        $tip->company = $request->company;
        $tip->address = $request->address;
        $tip->code = $request->code;
        $tip->approve = 0;
        // $tip->reply = $request->reply;
        // return $document;
        // return $tip;
        // $tip->save();
        if($document->save() && $tip->save()) {

            $notification = new Notification;
            $notification->to = NULL;
            $notification->from = $tip->user_id;
            $notification->link = url("tip/view/$tip->id");
            $notification->message = "A complaint was logged by ". $user->firstname;
            // $notification->time;
            $notification->save();

            return redirect('/tip/view/'.$tip->id)->with(['message' => 'Your complaint have been recorded. It will be directed to the appropriate channel', 'style' => 'alert-success']);
        }
        else {
            return redirect()->back()->with(['message' => 'Error Saving Complaint', 'style' => 'alert-danger']);
        }
    }
    public function edit($id) {
        $tip = Tip::where('id', $id)->first();
        return view('users-tips-edit', compact('tip'));
    }

    public function viewAndUploadMoreDocuments(Request $request) {
        $this->validate($request, [
            'document' => 'required|image|mimes:jpeg,png,jpg|max:1948',
        ]);
        $tipId = $request->tip_id;
        $userId = $request->user_id;
        $userObject = User::where('id', $userId)->first();
        $documentId = Document::where('tip_id', $tipId)->count()+1;


        $destinationPathOfDocumentsPicture = "uploads\documets";


        // $destinationPathOfDocumentsPicture = public_path("uploads\documents");


        $document = new Document;

        $file = $request->file('document');
        

        $filename = $userObject->email ."_". $tipId ."_". $documentId . ".png";

        if($request->hasFile('document')) {
            if ($file->isValid()) {
                
                if($file->move($destinationPathOfDocumentsPicture, $filename)) {

                    $document->tip_id = $tipId;
                    $document->title = $request->title;
                    $document->user_id = $userId;
                    $document->url = $destinationPathOfDocumentsPicture."/".$filename;

                }

            }
        }

        if($document->save()) {

            $notification = new Notification;
            $notification->to = NULL;
            $notification->from = $userId;
            $notification->link = url("tip/view/$tipId");
            $notification->message = "A new document has been uploaded by ".$userObject->firstname;
            $notification->save();

            return redirect('/tip/view/'.$tipId)->with(['message' => 'Your document has been saved. it will be reviewed asap', 'style' => 'alert-success']);
        }
        else {
            return redirect()->back()->with(['message' => 'Error Saving Document', 'style' => 'alert-danger']);
        }

    }


    public function update(Request $request) {
        $id = $request->id;
        $tip = Tip::find($id);
        $tip->type_of_organization = $request->type_of_organization;
        $tip->organization_name = $request->organization_name;
        $tip->type_of_tips = $request->type_of_tips;
        $tip->organization_address = $request->organization_address;
        $tip->organization_date = $request->organization_date;
        $tip->description = $request->description;
        $tip->conduct = $request->conduct;
        $tip->amount = $request->amount;
        $tip->company = $request->company;
        $tip->address = $request->address;
        $tip->code = $request->code;
        $tip->save();
        return redirect()->back()->with(['message' => 'Your complaint has been updated', 'style' => 'success']);
    }
    public function view($id) {
        $tip = Tip::where('id', $id)->first();
        $user = User::where('id', $tip->user_id)->first();
        $documentObject = Document::where('tip_id', $id);
        $documents = $documentObject->get();
        $noOfDocumentsUploaded = $documentObject->count(); //->where('user_id', $userId)
        return view('users-tips-view', compact('tip', 'noOfDocumentsUploaded', 'documents', 'user'));

    }


    public function index() {

    }


    public function newWhistles() {
        $userId = \Auth::user()->id;
        $tips = Tip::where('attended', 0)->where('user_id', $userId)->get();
        return view('tip-list', compact('tips'));

    }

    public function  oldWhistles() {
        $userId = \Auth::user()->id;
        $tips = Tip::where('attended', 1)->where('user_id', $userId)->get();
        return view('tip-list', compact('tips'));

    }

    public function notifications(){
        $userId = \Auth::user()->id;
        $notifications = Notification::where('to', $userId)->get();
        return view('user-notification', compact('notifications'));
    }

     public function readNotification($id) {
        $notification = Notification::find($id);
        $notification->status = 1;
        $notification->save();
        if($notification) {
            return redirect($notification->link);
        }
    }

    public function test() {
        return view('message-read');
    }

    public function viewDocument($id) {
        $documentObject = Document::where('tip_id', $id);
        $documents = $documentObject->get();
        $noOfDocumentsUploaded = $documentObject->count();
        $width = (100/($noOfDocumentsUploaded)) - 0.5;
        return view('document-view', compact('documents', 'width'));
    }

    public function notfound() {
        return view('400');
    }

    public function oldMessages(){
        $messages = Message::where('status', 1)->get();
        return view('message-list', compact('messages'));
    }
    public function newMessages(){
        $messages = Message::where('status', 0)->get();
        return view('message-list', compact('messages'));
    }
}
