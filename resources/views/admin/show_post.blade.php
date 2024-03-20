<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style type="text/css">
        
        .title_deg {
            font-size: 30px;
            font-weight: bold;
            color: white;
            padding: 30px;
            text-align: center;
        }

        *{
            font-family:'Courier New', Courier, monospace;
        }

        .table_deg {
            border: 1px solid white;
            width: 80px;
            text-align: center;
            justify-content: center;
            margin-left: 30px;
        }
        
        .box-image{
            width: 250px;
        }

        img
        {
            width: 250px;
            justify-content: center;
            align-items: center;
            height: auto;
        }
    </style>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->

        <div class="page-content">

            @if(session()->has('message'))

                <div class="alert alert-danger">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        x
                    </button>

                    {{session()->get('message')}}

                </div>
                

            @endif

            <h1 class="title_deg">All post</h1>

            <table class="table table-bordered">

                <tr>
                    <th>Post title</th>

                    <th>Description</th>

                    <th>Post by</th>

                    <th>Post status</th>

                    <th>UserType</th>

                    <th>Image</th>

                    <th>Delete</th>

                    <th>Edit</th>

                </tr>

                @foreach($post as $post)
                <tr class=" ">

                    <td>{{$post->title}}</td>

                    <td>{{$post->description}}</td>

                    <td>{{$post->name}}</td>

                    <td>{{$post->post_status}}</td>

                    <td>{{$post->usertype}}</td>

                    <td class="box-image">
                    
                        <img class=" img-fluid " src="postimage/{{$post->image}}" alt="">
                
                    </td>

                    <td>
                        <a href="{{url('delete_post',$post->id)}}"
                            class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                    </td>

                    <td>
                        <a href="{{url('edit_page',$post->id)}}"
                            class="btn btn-success" >Update</a>
                    </td>

                </tr>

                @endforeach

            </table>

        </div>


        @include('admin.footer')

        <script type="text/javascript">

            function confirmation(ev)
            {
                ev.preventDefault();

                var urlToRedirect= ev.currentTarget.getAttribute('href');

                console.log(urlToRedirect);

                swal({

                    title:"Are you Sure to delete this?",

                    text:"You won't be able to revert this delete",

                    icon : "warning" ,

                    buttons : true ,

                    dangerMode : true ,

                })
                
                .then((willCancel)=>
                {

                    if(willCancel)
                    {
                        window.location.href=urlToRedirect;
                    }

                })

            }

        </script>
</body>

</html>