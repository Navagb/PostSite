@extends('layouts.app')

@section('content')

    <div class="container">
        <h4 class="mt-5">{{$user->name}} <small>{{$user->posts->count()}}{{Str::plural(' post',$user->posts->count())}}</small></h4>
        <div class="row my-3">
            <div class="col-md-8 card ">
                @if ($posts->count())
                    @foreach ($posts as $post)
                    <div class="mb-5 py-3 px-2 border-bottom ">  
                            <div class="mb-1">
                                <small class="font-weight-bolder mr-2">{{$post->user->name}}</small>
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
                @else
                    <p class="my-3">Thera are not posts</p>
                @endif 
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