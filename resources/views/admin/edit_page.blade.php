<!DOCTYPE html>
<html>

<head>

    <base href="/public">

    @include('admin.css')

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

            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    x
                </button>

                {{session()->get('message')}}

            </div>


            @endif
            <h1 class="d-flex justify-content-center align-items-center post_title">Update POST</h1>
            <div class="d-flex justify-content-center align-items-center">
                <form action="{{url('update_post',$post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Post title</label>
                        <input class="form-control" type="text" name="title" value="{{$post->title}}">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description">{{$post->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Add image</label>
                        <input class="form-control" type="file" name="image">


                    </div>
                    <div>
                        <img class="w-50" src="postimage/{{$post->image}}" alt="">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary form-control" type="submit"></input>
                    </div>
                </form>
            </div>
        </div>

        @include('admin.footer')
</body>

</html>