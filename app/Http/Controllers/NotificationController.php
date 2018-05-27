<?php

namespace App\Http\Controllers;
use App\Repository\DataRepository;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //

    public function backupData () {
        $backup = new DataRepository;
        $backup->backupAllDatas();
    }
}
