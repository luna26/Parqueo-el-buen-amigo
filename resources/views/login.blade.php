<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Parqueo el buen amigo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="css/app.css" rel="stylesheet" type="text/css">

    </head>
    <body id='content-to-change'>
        <div>
            <div class="login-page">
                <div class="form">
                    <form class="login-form">
                        <input class='login-input-user' type="text" placeholder="usuario"/>
                        <input class='login-input-pass' type="password" placeholder="contrasena"/>
                        <button type='button' class='button-send-login' >Entrar</button>
                    </form>
                </div>
            </div>
        </div>
        <script src='js/app.js'></script>
        <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    </body>
</html>