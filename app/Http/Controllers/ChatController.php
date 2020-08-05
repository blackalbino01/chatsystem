<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\chat;

class ChatController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function home()
    {
    	$user = User::all();
    	return view('home',compact('user'));
    }
    public function send(Request $request)
    {
    	$message = $request->input('message');
    	$chat = chat::create(['message'=>$message]);
    	return redirect('chat');
    }
    public function chat()
    {
    	$chats = chat::all();
    	return view('chat',compact('chats'));
    }
}
