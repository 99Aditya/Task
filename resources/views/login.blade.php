<html>
    <title>Register</title>
    <body>
        <form action="{{url('/userlogin')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h4> User Login </h4>
            <input type="email" name="email" id="email" placeholder="Email"><br><br>
            @if($errors->has('email'))
                <div class="error">{{ $errors->first('email') }}</div>
            @endif<br>
            <input type="password" name="password" id="password" placeholder="Password"><br><br>
            @if($errors->has('password'))
                <div class="error">{{ $errors->first('password') }}</div>
            @endif<br>
            <input type="submit">
            <a href="{{url('/')}}">UserRegister</a>

        </form>
    </body>

</html>