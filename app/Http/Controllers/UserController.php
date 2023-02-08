<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        if(AUth::user()->isAdmin == 0){
            $users = User::all()->except(1);
            return view('users.list', compact('users'));
        } else {
            return redirect()->route('profile.show');
        }
    }

    public function user_delete($id)
    {
        $data1=User::where('id',$id)->delete();
        return redirect()->route('users.list');
    }

    public function show(Request $request)
    {
        return view('users.show', [
            'user' => $request->user(),
        ]);
    }

    public function edit($id){
        $user=User::where('id',$id)->first();
        return view('users.edit',compact('user'));
    }  
    
    public function update(request $request)
    {
        if($request->hasFile('image'))
        {
            $path = public_path() . '/images/' . $request->imageEdit;
            // if(file_exists($path))
            // {
            //     // unlink($path);
            // }
                $images = $request->image;
                $name=time(). mt_rand(10000, 99999);
                $imageName = $name .'.'. $images->getClientOriginalExtension();
                $originalPath = public_path().'/images/';
                $images->move($originalPath,$imageName);    

            $user=User::find($request->id);
            $user->name=$request->name;
            $user->profile_image=$imageName;
            $user->email=$request->email;
            $user->save();    
        }
        else
        {
             $user=User::find($request->id);
             $user->name=$request->name;
             $user->email=$request->email;
             $user->save();   
        }
        return redirect()->route('users.list');
    }

        /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
