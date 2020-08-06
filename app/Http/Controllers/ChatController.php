<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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
    	return view('home');
    }
    public function chat($user_id)
    {
        $chats = User::with('chats')->get();
        foreach($chats as $chat) {
           $ch = $chat->chats;
        }
        return view('chat',compact('ch'));
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
