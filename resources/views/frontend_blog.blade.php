<html>
    <title>Blogs</title>
    <body>
     

        <a href="{{url('/')}}">Home Page</a>
     
        <h2> All Blogs </h2>
        <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Image</th>
             
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
            

            </tr>
            @endforeach
            @endif
        </table>
    </body>

</html>