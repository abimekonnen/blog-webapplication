<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateProfileRequest;
use Illuminate\Http\Request;
use App\Models\User;
class UsersController extends Controller
{
    public function index()
    {
        return view('users.index')->with('users',User::all());
    }
    public function edit(){
        return view('users.edit')->with('user',auth()->user());
    }
    public function update(UpdateProfileRequest $request){
        $user = auth()->user();
        //dd($request->name);
        $user->update(
            [
            'name' => $request->name,
            'about'=> $request->about
            ]
        );
        session()->flash('success', 'Updated successfuly');
       
        return redirect()->back();
    }
    public function makeAdmin(Request $request, User $user)
    {   
        $user->role = 'admin';

        //$user->save();
      
        session()->flash('success', 'User make admin successfuly');
       
        return redirect(route('users.index'));
    }    
    public function makeAdmin1(Request $request, User $user)
    {
        //dd($user->id);
        $user->update(
            [
                'role' =>'admin'
                //$user->activated = 'admin'
            ]
        );
        session()->flash('success', 'User make admin successfuly');
        return redirect(route('users.index'));
    }    

   

}
