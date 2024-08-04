<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class TestController extends Controller
{
    public function testFunc(Request $request)
    {
    dd("wtf 1");
    }
}
