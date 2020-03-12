<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Jobtitle;

class JobtitleController extends Controller
{
    public function index()
    {
        $jt = Jobtitle::where('listid','>','-1')->get();
        return $jt;    
    }
}
