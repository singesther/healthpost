<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon"/>
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
</head>
   </head>
   <style>
body {
  background: #c9ccd1;
}
.form-style input {
  border: 0;
  height: 50px;
  border-radius: 0;
  border-bottom: 1px solid #ebebeb;
}
.form-style input:focus {
  border-bottom: 1px solid #007bff;
  box-shadow: none;
  outline: 0;
  background-color: #ebebeb;
}
.sideline {
  display: flex;
  /* width: 100%; */
  justify-content: center;
  align-items: center;
  text-align: center;
  color: #ccc;
}
button {
  height: 50px;
}
.sideline:before,
.sideline:after {
  content: "";
  border-top: 1px solid #ebebeb;
  margin: 0 20px 0 0;
  flex: 1 0 20px;
}

.sideline:after {
  margin: 0 0 0 20px;
}

</style>
<br><br>
<body>
<div class="container">
  <div class="row m-5 no-gutters shadow-lg">
    <div class="col-md-6 d-none d-md-block">
      <img src="https://images.unsplash.com/photo-1586077427825-15dca6b44dba?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=334&q=80" class="img-fluid" style="min-height:100%;" />
    </div>
    <div class="col-md-6 bg-white p-5">
      <h4 class="pb-3">Login </h4>
      <div class="form-style">
      <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
          <div class="form-group pb-3">
            <input type="email" placeholder="Email"  name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required
                                    autofocus>
                                    @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif

          </div>
          <div class="form-group pb-3">
            <input type="password" placeholder="Password" class="form-control" id="exampleInputPassword1" name="password" required >
            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center"><input name="remember" type="checkbox" value="" /> <span class="pl-2 font-weight-bold">Remember Me</span></div>
            <div><a href="#">Forget Password?</a></div>
          </div>
          <div class="pb-2">
            <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2">Submit</button>
          </div>
        </form>
        <div class="sideline">OR</div>

        <div class="pt-4 text-center">
          Get Members Benefit. <a href="registration">Sign Up</a>
        </div>
      </div>

    </div>

  </div>
</div>
</body>
</html>
