<html>
    <title>Blogs</title>
    <body>
        
        <a href="{{url('/blog-list')}}"> Blog Listing</a>
        <form action="{{url('/blog')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h4> Blog</h4>
            <input type="text" name="title" id="title" placeholder="title" min="4
            "><br><br>
            @if($errors->has('title'))
                <div class="error">{{ $errors->first('title') }}</div>
            @endif<br>
            <textarea name="description" id="description" placeholder="Description"></textarea><br><br>
            @if($errors->has('description'))
                <div class="error">{{ $errors->first('description') }}</div>
            @endif<br>
            <p> Start Date</p>
            <input type="date" name="start_date" id="start_date" placeholder="Start Date "><br><br>
            @if($errors->has('start_date'))
                <div class="error">{{ $errors->first('start_date') }}</div>
            @endif<br>
            <p> End Date</p>
            <input type="date" name="end_date" id="end_date" placeholder="end_date"><br><br>
            @if($errors->has('end_date'))
                <div class="error">{{ $errors->first('end_date') }}</div>
            @endif<br>
            <input type="file" name="image" id="image"><br><br>
            @if($errors->has('image'))
                <div class="error">{{ $errors->first('image') }}</div>
            @endif<br>
            <select name="status" id="status">
                <option value="">Select Role</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>

            </select><br><br>
            @if($errors->has('status'))
                <div class="error">{{ $errors->first('status') }}</div>
            @endif<br>
            <input type="submit">
        </form>
    </body>

</html>