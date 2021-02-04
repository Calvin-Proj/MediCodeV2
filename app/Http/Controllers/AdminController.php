<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    //button routes for admin
    public function indexmodule()
    {
        return view('usertypes.admin.managemodule');
    }
    public function indexassign()
    {
        return view('usertypes.admin.assinvig');
    }
    public function indexvenue()
    {
        return view('usertypes.admin.managevenue');
    }
    public function indexlecturer()
    {
        return view('usertypes.admin.managelecturer');
    }
    public function indexinvig()
    {
        return view('usertypes.admin.manageinvig');
    }
    public function indexstudent()
    {
        return view('usertypes.admin.managestudent');
    }
    public function indexhelp()
    {
        return view('usertypes.admin.adminhelp');
    }
}
