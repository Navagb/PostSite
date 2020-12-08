<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{env('APP_NAME')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
       
     
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
        <style>
            ul{
                list-style-type: none;
            }
            a:hover{
                text-decoration: none;
            }
            #logoutbtn{
                text-decoration: none;
            }
            .editlogo{
                width: 25px;
            }
        </style>
        
    </head>
    <body class="pt-5 ">
        <div class="container-fluid bg-dark fixed-top">
            <nav class="d-flex justify-content-between py-3 align-items-center">
                <div class="text-white">
                    <a href="{{route('home')}}" class="text-white"> <span class="h3">{{env('APP_NAME')}}</span></a>
                </div>
                <div class="">
                    <a href="{{route('home')}}" class="text-white"> <span class="">Posts</span></a>
                </div>
                <ul class="d-flex flex-row my-0 align-items-center">
                    <a href="{{route('postcreate')}}" class="mr-2"><img src="{{asset('images/edit-regular.svg')}}" alt="" class="editlogo"></a>
                    @auth
                   
                    <li class="px-2"><a href="{{route('user.post' , auth()->user())}}" class="text-white">{{auth()->user()->name}}</a></li>
                    <li class="px-2">
                        <form action="{{route('logout')}}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn-link btn p-0 border-0 text-white" id="logoutbtn">Logout</button>
                        </form>
                    </li>
                    
                    @endauth
                    @guest
                    <li class="px-2"><a href="{{route('login')}}" class="text-white">Login</a></li>
                    <li class="px-2"><a href="{{route('register')}}" class="text-white">Register</a></li>
                    @endguest
                    
                </ul>
            </nav> 
        </div>
        @yield('content')
       
    </body>
</html>
