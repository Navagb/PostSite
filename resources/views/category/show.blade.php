@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 card my-5">
            @foreach ($posts as $post)
            <div class="mb-5 py-3 px-2 border-bottom ">  
                    <div class="mb-1">
                        <small class="font-weight-bolder mr-2">{{$post->user->name}}</small>
                        <small>{{$post->created_at->diffForHumans()}}</small>    
                    </div> 
                    <h3>{{$post->title}}</h3>
                    <p>{{$post->meta_title}}</p>
                    
                    <a href="{{route('posts.show' , $post)}}"class="btn btn-primary py-0 px-1">Read More</a>
                </div>
            @endforeach
            <div class="">
                {{$posts->links()}}
            </div>
        </div>
    </div>

@endsection