<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="slide navbar style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
    <div class="main">
        <div>
            <a href="{{route('home')}}" class="back-to-home" style="color: white; display: inline-block; margin-left: 20px; vertical-align: middle; "><img src="images/home.png" alt="Home" style="width:20px; height:20px; margin-right: 5px; "> Home</a>
        </div>
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="signup">
            <img src="images/logo.png" alt="Image" style="width: 30%; max-width: 300px; margin: 10px auto; display: block;">
            <form method="POST" action="{{route('auth.login')}}">
                @csrf
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <button>Login</button>

            </form>
            <div class="forgot-password">
                <a href="{{route('auth.view_forgot_password')}}" style="margin-left: 20px;">Lupa Password?</a>
            </div>

        </div>
        <div class="login">
            <form method="POST" action="{{route('auth.signup')}}">
                @csrf
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="name" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button>Sign up</button>
            </form>
        </div>
    </div>
</body>
</html>
