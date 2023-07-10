<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('usermanagement.list',compact('users'));
    }
    public function create(){
        return view('usermanagement.add');
    }
    public function store(Request $reg){
        $dataUser = array(
            'username'=>$reg->input('username'),
            'password'=>\Hash::make($reg->input('password')),
            'level'=>$reg->input('level'),
            'status'=>1
        );
        $user = User::create($dataUser);
        if($user){
            return redirect('user')
            ->with([
                'status'=>'alert-success',
                'message' => 'User berhasil ditambahkan',
            ]);
        }else{
            return redirect('user')
            ->with([
                'status'=>'alert-danger',
                'message' => 'User gagal ditambahkan',
            ]);
        }
    }
    public function show($id){
        $data = User::where('id',$id)->first();
        return view('usermanagement.add',compact('data'));
    }
    public function update(Request $reg,$id){
        if($reg->input('password')==""){
            User::where('id',$id)->update(
                [
                    'level'=>$reg->input('level')
                ]
            );
        }else{
            User::where('id',$id)->update(
                [
                    'password'=>\Hash::make($reg->input('password')),
                    'level'=>$reg->input('level')
                ]
            );
        }
        return redirect('user')
            ->with([
                'status'=>'alert-success',
                'message' => 'User berhasil diupdate',
            ]);
    }
    public function destroy($id){
        User::where('id',$id)->delete();
        return redirect('user')
            ->with([
                'status'=>'alert-success',
                'message' => 'User berhasil dihapus',
            ]);
    }
}
