@extends('layouts.app')
@section('content')
<style>
  h2{
color:white;
  }
  span{
	  color:#673ab7;
	  font-weight:bold;
  }
  .container {
    margin-top: 3%;
    width: 60%;
    background-color: #26262b9e;
    padding-right:10%;
    padding-left:10%;
  }
  .btn-primary {
    background-color: #673AB7;
	}
	.display-chat{
		height:300px;
		background-color:#d69de0;
		margin-bottom:4%;
		overflow:auto;
		padding:15px;
	}
	.message{
		background-color: #c616e469;
		color: white;
		border-radius: 5px;
		padding: 5px;
		margin-bottom: 3%;
	}
  </style>

<div class="container">
  <center><h2>Welcome <span style="color:#dd7ff3;">
  @foreach($chats as $chat)
  	{{$chat->user}}!</span></h2>
	<label>Join the chat</label>
  </center></br>
  <div class="display-chat">
		<div class="message">
			<p>
				<span>{{$chat->user}}:</span>
				{{$chat->message}}
			</p>
		</div>
	@endforeach

  </div>
  <form class="form-horizontal" method="post" action="{{route('send')}}">
  	@csrf
    <div class="form-group">
      <div class="col-sm-10">          
        <textarea name="msg" class="form-control" placeholder="Type your message here..."></textarea>
      </div>
	         
      <div class="col-sm-2">
        <button type="submit" class="btn btn-primary">Send</button>
      </div>

    </div>
  </form>
</div>
@endsection