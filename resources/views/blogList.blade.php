<html>
    <title>Blogs</title>
    <body>
        <a href="{{url('/dashboard')}}">Create Blogs</a>
     
        <h2> All Blogs </h2>
        <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Image</th>
                @if(isset($front) &&  $front!='all_users')
                <th>Action</th>
                @endif
            </tr>
            @if($all_data)
            @foreach($all_data as $data)
            <tr>
                <th>{{$data['title']}}</th>
                <th>{{$data['description']}}</th>
                <th>{{$data['start_date']}}</th>
                <th>{{$data['end_date']}}</th>
                <th>{{$data['status']}}</th>
                <th><img src="{{url('public/blog-images',$data['image'])}}" style="width:70px;"></th>
             
                <th><a href="{{url('/blogEdit/'.$data['id'])}}">Edit</a> <a href="{{url('/blogDelete/'.$data['id'])}}">Delete</a></th>
              

            </tr>
            @endforeach
            @endif
        </table>
    </body>

</html>