<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <title>Blog Petaxxon</title>
    <style>
        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
    @stack('head')
</head>
<body>
    <div class="container-fluid mb-4 bg-white">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <img src="{{asset('img/logo-horizontal.jpg')}}" class="img-fluid" style="width:30%" alt="" srcset="">
                <h1 class="font-weight-bolder" style="font-family: 'Roboto',sans;">O blog do entretenimento e diversão</h1>
            </div>
            <div class="col-12 py-4" style="background-color: #d1a400;">
                <div class="row px-4">
                    <div class="col-6">
                       <a href="/">
                           <img src="{{asset('img/logo-horizontal.jpg')}}" class="bg-white p-1 rounded img-fluid" style="max-width: 300px;" alt="" srcset="">
                       </a>
                    </div>
                    <div class="col-6 text-right">
                        <a href="/register" class="btn btn-light font-weight-bolder">Crie sua conta gratuitamente</a>
    
                    </div>

                </div>
            </div>
        </div>
    </div>
    @yield('content')    
</body>
</html>