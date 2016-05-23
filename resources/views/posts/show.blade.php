@extends('layouts.blog')

@section('content')

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p>
                    by <b>{{$post->user->name}}</b> <span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}
                </p>

                <!-- Preview Image -->
                @if(!is_null($post->photo))

                    <img class="img-responsive" src="{{$post->photo->filename}}" alt="">

                    <hr>

                @endif

                <hr>

                <!-- Post Content -->
                <p>{!! $post->body !!}</p>

                <hr>

                @if(Session::has('comment_created') || Session::has('reply_created'))

                    <div class="alert alert-info">
                        <p>{{session('comment_created')}}</p>
                        <p>{{session('reply_created')}}</p>
                    </div>

                @endif                

                <!-- Blog Comments -->

                <!-- Comments Form -->
                    @if(Auth::check())
                    <div class="well">
                        
                        <h4>Leave a Comment:</h4>
                        
                        {!! Form::open(['method'=>'POST', 'action'=>'PostsController@store']) !!}

                            <input type="hidden" name="post_id" value="{{$post->id}}">

                            <div class="form-group">
                                {!! Form::label('body', 'Message') !!}
                                {!! Form::textarea('body', null, ['class'=>'form-control']) !!}             
                            </div>                      

                            <div class="form-group">
                                {!! Form::submit('Submit', ['class'=>'btn btn-success']) !!}
                            </div>                      


                        {!! Form::close() !!}
                        
                </div>
                @endif

                <!-- Posted Comments -->

                <!-- Comment -->

                @foreach($comments as $comment)
                    
                    <hr>   

                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="{{$comment->user_photo ? $comment->user_photo : 'http://placehold.it/400x400'}}" height="64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$comment->name}}
                                <small>{{$comment->created_at->diffForHumans()}}</small>
                            
                            </h4>
                            {{$comment->body}}

                            <div class="pull-right">
                                <button class="btn btn-info reply-btn">Respond</button> 
                            </div>



                            <div class="form-reply-container">
                            
                                <!-- Nested Reply Form Opening -->
                                    
                                {!! Form::open(['method'=>'POST', 'action'=>'PostRepliesController@store']) !!}
                                    
                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                    <div class="form-group">
                                        {!! Form::label('body', 'Message') !!}
                                        {!! Form::textarea('body', null, ['class'=>'form-control', 'size'=>'1x5']) !!}                                      
                                    </div>

                                    <div class="form-group">
                                        {!! Form::submit('Send', ['class'=>'btn btn-success']) !!}
                                    </div>


                                {!! Form::close() !!}

                                <!-- Nested Reply Form Closing -->

                            </div>        
                                                
                            {{dd($comment->id))}}


                    </div>
                </div>
            @endforeach
            </div>

        </div>
        <!-- /.row -->

@endsection

@section('scripts')
    <script>
$('.reply-btn').click(function(){

        $(this).parent().next().slideToggle('slow');

    });
    </script>
@endsection