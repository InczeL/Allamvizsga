<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/myapp.css') }}">
    <title>@yield("title")</title>
    <style>
        .btn:focus {
            outline: none;
            box-shadow: none;
        }

        .navbar-toggler:focus {
            outline: none;
            box-shadow: none;
        }

    </style>
    @yield('asset')
    @livewireStyles
</head>

<body>
    <header>
    
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Test</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MobileMenu"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="MobileMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Főoldal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/taskDesc">Feladatok</a>
                        </li>
                    </ul>
                    @if (!session()->has('LoggedUser'))
                        <div>
                            <button class="btn btn-success"><a class="nav-link"
                                    href="{{ route('login') }}">Login</a></button>
                            <button class="btn btn-success"><a class="nav-link"
                                    href="{{ route('register') }}">Registetr</a></button>
                        </div>
                    @else
                        <div class="navbar">
                            <button class="btn dropdown-toggle me-5" type="button" data-bs-toggle="dropdown">
                                <img src="avatars/{{session()->get('LoggedUser')->profile_img}}"
                                    width="30" height="30" class="rounded-circle">
                            </button>
                            <ul class="dropdown-menu dropdown-menu-start dropdown-menu-lg-end">
                                <li><a class="dropdown-item" href="/profile">Profil</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Kijelentkezés</a></li>
                                @if (session()->get('LoggedUser')->role == 2 || session()->get('LoggedUser')->role == 0)
                                    <li><a class="dropdown-item" href="{{route('newtask')}}">Feladataim</a></li>
                                @endif
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </nav>


    </header>
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous">
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
        integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous">
    </script>

    @yield('content')
    @livewireScripts
    <script>
        window.livewire.on('newTaskAdded',()=>{
            $('#addTaskModal').modal('hide');
        })
        window.livewire.on('taskUpdated',()=>{
            $('#updateTaskModal').modal('hide');
        })
    </script>
</body>

</html>
