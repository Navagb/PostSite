@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top:3rem">
        <div class="row align-items-start mb-3">
            <div class="col-md-8 card">
                @foreach ($posts as $post)
                <div class="mb-5 py-3 px-2 border-bottom ">  
                        <div class="mb-1">
                            <a href="{{route('user.post' , $post->user)}}"><small class="font-weight-bolder mr-2">{{$post->user->name}}</small></a>
                            <small>{{$post->created_at->diffForHumans()}}</small>    
                        </div> 
                        <h3>{{$post->title}}</h3>
                        <p>{{$post->meta_title}}</p>
                        <div class="row px-3">
                            <a href="{{route('posts.show' , $post)}}"class="btn btn-primary py-0 px-1 mr-3">Read More</a>
                            @can('delete', $post)
                            <form action="{{route('posts.destroy', $post)}}"  method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn py-0 px-1 btn-danger">Delete</button>
                            </form>
                            @endcan
                        </div>
                    </div>
                @endforeach
                <div class="">
                    {{$posts->links()}}
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 mb-3 ">
                    <h4>Categories</h4>
                    @foreach ($categories as $category)
                        <a href="{{route('categories.show' , $category)}}"><p>{{$category->name}}</p></a>
                        
                    @endforeach
                </div>
                <div class="card p-3">
                <h4 class="">Recomended</h4>
                    @foreach ($recomendeds as $recomended)
                        <div class="mb-3">
                            <a href="{{route('posts.show',$recomended)}}"><p class="mb-1">{{$recomended->title}}</p></a>
                            <small>{{$recomended->created_at->diffForHumans()}}</small>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection