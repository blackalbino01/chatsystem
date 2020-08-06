<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>dconnect</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <style type="text/css">
      html, body {
        background-image:url("{{asset('img/home.jpg')}}");
        background-repeat: repeat-y;
        width:100%;
        }
      h2{
        color:white;
      }
      label{
        color:white;
      }
      span{
        color:#673ab7;
        font-weight:bold;
      }
      .content {
        margin-top: 3%;
        margin-left: 20%;
        width: 60%;
        background-color: #26262b9e;
        padding-right:10%;
        padding-left:10%;
      }
      .btn-primary {
        background-color: #673AB7;
        margin-left: -20px;
        bottom: 10px;
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
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    dconnect
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="content">
                <center><h2>Welcome <span style="color:#dd7ff3;">{{ Auth::user()->name }}!</span></h2>
                <label>Join the chat</label>
                </center></br>
                <div class="display-chat">
                  @foreach($ch as $c)
                  <div class="message">
                    <p>
                      <span>{{ Auth::user()->name }}:</span>
                      {{$c->message}}
                    </p>
                  </div>
                  @endforeach
                </div>
                <form class="form-horizontal" method="post" action="{{route('send')}}">
                  @csrf
                  <div class="form-group">
                    <div class="row" style="margin-bottom: 20px;">
                      <div class="col-sm-10">          
                        <textarea name="message" class="form-control" placeholder="Type your message here..."></textarea>
                      </div>
                      <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary">Send</button>
                      </div>
                    </div>

                  </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>