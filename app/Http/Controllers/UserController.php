<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\support\facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
        $no =0;
        $batas =5;
        $jumlah_user = User::count();
        $data_user = User::orderBy('id', 'desc')->paginate($batas);
        
        return view('layout.user',compact('batas','jumlah_user','data_user','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required',
        ],
        [
            'name.required' => "nama wajib diisi",
            'email.required' => "email wajib diisi",
            'password.required' => "password wajib diisi",
            
        ]
    );

        $data_user = new User;
        $data_user->name = $request->name;
        $data_user->email = $request->email;
        $data_user->password = Hash::make($request['password']);
        $data_user->level = $request->level;
        $data_user->save();
       
        return redirect('/user');
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
        $data_user = User::find($id);
        return view('user.update',compact('data_user'));
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
        
        $data_user = User::find($id);
        $data_user->name = $request->name;
        $data_user->email = $request->email;
        // $data_user->level = $request->level;
        // $data_user->password = Hash::make($request['password']);
        $data_user->update();
        return redirect('/user')->with('pesanUpdate','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_user = User::find($id);
        $data_user->delete();
        return redirect('/user')->with('pesanHapus','Data Berhasil Dihapus');
    }
}
