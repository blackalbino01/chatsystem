<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\chat;

class ChatController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }
    public function index()
    {
        return view('home');
    }

    public function home()
    {
    	$user = User::all();
    	return view('home',compact('user'));
    }
    public function chat()
    {
      return chat::with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function send(Request $request)
    {
      $user = Auth::user();

      $message = $user->chats()->create([
        'message' => $request->input('message')
      ]);

      return redirect('chat');
    }
}
