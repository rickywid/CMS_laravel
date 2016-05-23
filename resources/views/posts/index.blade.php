@extends('layouts.blog')

@section('content')


    <!-- Page Content -->
    <div class="container">

        <div class="row">


            
            <!-- Blog Entries Column -->
            <div class="col-md-8 col-md-offset-2">

                <!-- Blog Posts -->
                @foreach($posts as $post)
                
                <h2>
                    {{$post->title}}
                </h2>
                <p>
                    by <b>{{$post->user->name}}</b> <span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}
                </p>
                
                <!-- Preview Image -->
                @if(!is_null($post->photo))

                    <img class="img-responsive" src="{{$post->photo->filename}}" alt="">

                    <hr>

                @endif
                <hr>
                <p>{{str_limit($post->body, 300)}}</p>
                <a class="btn btn-primary" href="{{route('post.show', $post->id)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                @endforeach

            </div>
        </div>
        <!-- /.row -->

@endsection