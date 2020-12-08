@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-4 mx-auto card mt-5 p-3">
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') border-danger @enderror" id="name" placeholder="Your name" name="name" value="{{old('name')}}">
                    @error('name')
                        <div class="text-danger mt-2 mb-0">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control @error('name') border-danger @enderror" id="username" placeholder="Your username" name="username" value="{{old('username')}}">
                    @error('username')
                        <div class="text-danger mt-2">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('name') border-danger @enderror" id="email" placeholder="Your email" name="email" value="{{old('email')}}">
                    @error('email')
                        <div class="text-danger mt-2">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('name') border-danger @enderror" id="password" placeholder="Password" name="password" >
                    @error('password')
                        <div class="text-danger mt-2">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm your password</label>
                    <input type="password" class="form-control" id="password" placeholder="Confirm your password" name="password_confirmation">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
                
            </form>
        </div>
    </div>
@endsection