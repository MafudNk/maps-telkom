<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return view('User.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
        $this->validate(Request(), [
            'nama' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'repass' => 'same:password',
            'cbstatus' => 'required',
            ]);
        $user = new User;
        $user->name = $request->nama;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->status = $request->cbstatus;

        if ($user->save()) {
            Session::flash('flash_notification',[
                "level"     => "success",
                "message"   => 'data <b>'.$user->name.'</b> berhasil disimpan'
            ]);            
        }else{
            Session::flash('flash_notification',[
                "level"     => "danger",
                "message"   => 'data <b>'.$user->name.'</b> gagal disimpan'
            ]);
        }
    // }
        
        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user = User::find($id);
        return view('User.update',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(Request(), [
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'repass' => 'same:password',
            ]);
         $user = User::find($id);
        $user->name = $request->nama;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);

        if ($user->save()) {
            Session::flash('flash_notification',[
                "level"     => "success",
                "message"   => 'data <b>'.$user->name.'</b> berhasil diubah'
            ]);            
        }else{
            Session::flash('flash_notification',[
                "level"     => "danger",
                "message"   => 'data <b>'.$user->name.'</b> gagal diubah'
            ]);
        }
        
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user = User::find($id);
       
       if ($user->delete()) {
            Session::flash('flash_notification',[
                "level"     => "success",
                "message"   => 'data <b>'.$user->name.'</b> berhasil dihapus'
            ]);            
        }else{
            Session::flash('flash_notification',[
                "level"     => "danger",
                "message"   => 'data <b>'.$user->name.'</b> gagal dihapus'
            ]);
        }
        
        return redirect('user');
    }
}
