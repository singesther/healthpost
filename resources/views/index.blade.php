

@extends('layout')<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section class="login-container">
        <div class="container">
            <form class="form-login">
                <div class="form-logo"><i class="fas fa-book-open"></i></div>
                <p class="first-child"><span>Sign in to your Book account</span></p>
                <label>Email</label>
                <input type="email" name="Email">
                <label>Password</label>
                <input id="inputPass" type="password" name="Password">
                <span id="changeIcon" class="fas fa-eye" onclick="ShowHidePass()"></span>
                <div class="remember-and-forgot-pass">
                <div><input type="checkbox" name="Remember"><span>Remember Me</span></div>
                <a href="#"><strong>Forgot Password?</strong></a>
                </div>
                <input type="button" value="Log In">
                <p><span>OR</span></p>
                <div class="auth-app">
                    <div class="auths auth-google"><i class="fab fa-google"></i></div>
                    <div class="auths auth-twitter"><i class="fab fa-twitter"></i></div>
                    <div class="auths auth-apple"><i class="fab fa-apple"></i></div>
                </div>
                <div class="register-info"><span>Don't have an account yet?</span><a href="#"><strong>Create an account</strong></a></div>
            </form>
        </div>
    </section>
</body>
</html>

hhhhhhhhhhhhhhhh