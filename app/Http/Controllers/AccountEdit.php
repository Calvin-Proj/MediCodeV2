<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Rules\MatchPassword;
use Illuminate\Support\Facades\Hash;

class AccountEdit extends Controller
{
    public function edit($userid)
    {
        $user = User::find($userid);

        if($user->usertype=='admin'){
            return view('usertypes.admin.editAccountA')->with('user',$user);  
        }
        elseif ($user->usertype=='lecturer') {
            return view('usertypes.lecturer.editAccountL')->with('user',$user);   
           
        }
        elseif ($user->usertype=='student') {
            return view('usertypes.student.editAccountS')->with('user',$user);  
        }
        elseif ($user->usertype=='invig') {
            return view('usertypes.invig.editAccountI')->with('user',$user);  
        }    
    }

    public function update($userid)
    {
       $this->validate(request(), 
       [
          'name' => 'required|min:3|string',
          'email' => 'required|email',
          'currentPassword' => ['required', new MatchPassword]
        ]);

       $data = request()->all();
       $user = User::find($userid);  
       $user->name= $data['name'];
       $user->email= $data['email'];

      if($data["newPassword"]=='')
        { 
           
        }
        else 
        {   
           
        $this->validate(request(), 
         [  
            'newPassword' => 'min:6',
            'confirmPassword' => ['same:newPassword']
         ]);

         $user->password= Hash::make($data['newPassword']);
            }
  
        $user->save();

        session()->flash('updated', 'Account successfully updated ');
 
      
       return redirect('/');

    }
}
