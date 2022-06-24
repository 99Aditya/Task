<html>
    <title>Blogs</title>
    <body>
        <form action="{{url('/blogUpdate/'.$single_data['id'])}}" method="post" enctype="multipart/form-data">
            @csrf
            <h4>Edit Blog</h4>
            <input type="text" name="title" id="title" value="{{$single_data['title']}}" placeholder="title" min="4
            "><br><br>
            @if($errors->has('title'))
                <div class="error">{{ $errors->first('title') }}</div>
            @endif<br>
            <textarea name="description" id="description" >{{$single_data['description']}}</textarea> <br><br>
            @if($errors->has('description'))
                <div class="error">{{ $errors->first('description') }}</div>
            @endif<br>
            <p> Start Date</p>
            <input type="date" name="start_date" id="start_date" value="{{$single_data['start_date']}}" placeholder="Start Date "><br><br>
            @if($errors->has('start_date'))
                <div class="error">{{ $errors->first('start_date') }}</div>
            @endif<br>
            <p> End Date</p>

            <input type="date" name="end_date" id="end_date" value="{{$single_data['end_date']}}" placeholder="end_date"><br><br>
            @if($errors->has('end_date'))
                <div class="error">{{ $errors->first('end_date') }}</div>
            @endif<br>
            <input type="file" name="image" id="image"><br><br>
            <img src="{{url('public/blog-images',$single_data['image'])}}" style="width:70px;"><br><br>
            @if($errors->has('image'))
                <div class="error">{{ $errors->first('image') }}</div>
            @endif<br>
            <select name="status" id="status">
                <option value="">Select Role</option>
                <option value="active" @if($single_data->status == "active") selected @endif>Active</option>
                <option value="inactive" @if($single_data->status == "inactive") selected @endif>Inactive</option>

            </select><br><br>
            @if($errors->has('email'))
                <div class="error">{{ $errors->first('email') }}</div>
            @endif<br>
            <input type="submit">
        </form>
    </body>

</html>