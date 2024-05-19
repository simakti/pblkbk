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
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="signup">
            <img src="images/logo1.png" alt="Image" style="width: 30%; max-width: 300px; margin: 10px auto; display: block;">
            <form method="POST" action="{{route('auth.forgot_password')}}">
                @csrf
                <label aria-hidden="true">Forgot Password</label>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_confirmation" placeholder="Password Confirmation" required>
                <button>Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
