<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Registration;

class RegistrationController extends Controller
{
    public function index()
    {
        $reg = Registration::where('listid','>','-1')->get();
        return $reg;    
    }
}
