<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lending Project</title>
    <link rel="shortcut icon" href="/images/logo.png" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="/css/materialize.css" rel="stylesheet" type="text/css">
    <link href="/css/style.css" rel="stylesheet" type="text/css">

    <script src="/js/app.js"></script>
    <script src="/js/list.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

</head>

<body>
<br>
<br>
<br>
<br>
    <div class="valign-wrapper ">
        <div class="row">
            <div class="valign">
                <h4>Please Login</h4>
            </div>
            <div class="col s12 m12 l12">
                <form class="card-panel">
                    <div class="input-field">
                        <input type="email" id="username" class="validate">
                        <label for="username" class="center-align">Enter Your Email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" id="password" class="validate">
                        <label for="password" class="center-align">Enter Your Password</label>
                    </div>
                    <button type="submit" class="button buttonBlue">Login</button>
                </form>
                <a href="#" class="right">Forgot your password?</a>
            </div>
        </div>
    </div>
</body>

</html>