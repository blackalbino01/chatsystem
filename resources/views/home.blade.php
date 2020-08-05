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
</style>
<div class="container">
    <center>
        <h2>
            Welcome 
            <span>
                @foreach($user as $us)
                    {{$us->name}}
                @endforeach!
            </span>
        </h2>
        <br><br>
        <label>Click below to Join the chat</label><br>
        <br><br>
        <a href="{{route('chat')}}" class="btn btn-primary">Open Chat</a>
    </center> 
  
</div>
@endsection
