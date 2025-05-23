<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserInfoRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function SayHello()
    {
return 'Yasin';
    }

    public function store(UserInfoRequest $userInfoRequest)
    {
Admin::create($userInfoRequest->all());
    }



}
