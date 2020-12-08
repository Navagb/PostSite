@extends('layouts.app')

@section('content')

    <div class="container mt-5 ">
        <div class="row align-items-start mb-3">
            <div class="col-md-8 card">
                <div class="mb-1">
                    <small class="font-weight-bolder mr-2">{{$post->user->name}}</small>
                    <small>{{$post->created_at->diffForHumans()}}</small>    
                </div> 
                <h1>{{$post->title}}</h1>
                <p>{{$post->meta_title}}</p>
                <p>{{$post->text}}</p>

                <div class="">
                    <h2>Comments</h2>
                    @auth
                        <form action="{{route('comment.store',$post)}}" class="mb-3" method="POST">
                            @csrf
                            <label for="comment">Add a Comment</label>
                            <div class="form-row">
                                <div class="col-10">
                                    <textarea name="comment" id="comment"  rows="1" class="form-control"></textarea>
                                </div>
                                    <button type="submit"class="btn btn-primary px-4">Comment</button>
                            </div>   
                        </form>
                    @endauth
                    @guest
                        <h4 class="text-primary card p-2"><a href="{{route('login')}}"> Sign up to leave a comment </a></h4>
                    @endguest
                    @foreach ($post->comentaries as $coment)
                        <div class="card mb-2 w-auto d-inline-block">   
                            <div class="align-items-center card-header">
                                <a href='' class="font-weight-bolder mr-2 ">{{$coment->user->name}}</a>
                                <small>{{$coment->created_at->diffForHumans()}}</small>
                            </div>
                            <div class="card-body py-1">
                                <p class="card-text">{{$coment->body}}</p>
                            </div>
                        </div><br>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 mb-3 ">
                    <h4>Categories</h4>
                    @foreach ($categories as $category)
                        <a href="{{route('categories.show' , $category)}}"><p>{{$category->name}}</p></a>
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection