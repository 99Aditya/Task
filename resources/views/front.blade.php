<html>
    <title>Register</title>
    <body>
        <a href ="{{url('/allBlogs')}}"> All Blogs</a>
        <form action="{{url('/register')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h4> User Register</h4>
            <input type="text" name="first_name" id="first_name" placeholder="first_name" min="4
            " max="20"><br><br>
            @if($errors->has('first_name'))
                <div class="error">{{ $errors->first('first_name') }}</div>
            @endif<br>

            <input type="text" name="last_name" id="last_name" placeholder="last_name" min="4
            " max="20"><br><br>
            @if($errors->has('last_name'))
                <div class="error">{{ $errors->first('last_name') }}</div>
            @endif<br>
            <input type="email" name="email" id="email" placeholder="Email"><br><br>
            @if($errors->has('email'))
                <div class="error">{{ $errors->first('email') }}</div>
            @endif<br>

            <input type="password" name="password" id="password" placeholder="Password" min="4
            " max="20"><br><br>
            @if($errors->has('password'))
                <div class="error">{{ $errors->first('password') }}</div>
            @endif<br>

            <input type="date" name="dob" id="dob" placeholder="DOB"><br><br>
            @if($errors->has('dob'))
                <div class="error">{{ $errors->first('dob') }}</div>
            @endif<br>

            <input type="file" name="image" id="image"><br><br>
            @if($errors->has('image'))
                <div class="error">{{ $errors->first('image') }}</div>
            @endif<br>

            <select name="role" id="role">
                <option value="">Select Role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select><br><br>
            @if($errors->has('role'))
                <div class="error">{{ $errors->first('role') }}</div>
            @endif<br>
            <input type="submit">
            <a href="{{url('/login')}}">UserLogin</a>

        </form>
    </body>

</html>