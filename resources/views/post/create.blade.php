@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 mx-auto my-5">
            <form action="{{route('post.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') border-danger @enderror" id="title"  name="title" value="{{old('title')}}">
                    @error('title')
                        <div class="text-danger mt-2 mb-0">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="meta_title">Meta title</label>
                    <textarea style="resize:none"class="form-control @error('meta_title') border-danger @enderror" id="meta_title"  name="meta_title" value="{{old('meta_title')}}" rows='4'></textarea>
                    @error('meta_title')
                        <div class="text-danger mt-2 mb-0">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="text">Post Text</label>
                    <textarea class="form-control @error('text') border-danger @enderror" id="text"  name="text" value="{{old('text')}}" rows='15' style="resize:none"></textarea>
                    @error('text')
                        <div class="text-danger mt-2 mb-0">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group ">
                    <label for="categories">Categories <small class="text-muted">(hold down Ctrl or Command to select multiple options)</small></label>
                    <select class="custom-select"name="categories[]" id="categories" multiple size="3">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary px-4 float-right py-0">Create</button>
                </div>
            </form>
        </div>
    </div>
   
@endsection