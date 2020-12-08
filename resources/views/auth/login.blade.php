@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-4 mx-auto card mt-5 p-3">
            <form action="{{route('login')}}" method="POST">
                @csrf
                @if (session('status'))
                    <div class="text-danger">
                        {{session('status')}}
                    </div>
                    
                @endif
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
                  <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="checkbox" name="remember">
                    <label class="form-check-label" for="checkbox">Remember me</label>
                  </div>
                  <div class="mb-1">
                      <button type="submit" class="btn btn-primary btn-block">Login</button>
                  </div>
            </form>
            <div>
                <a href="{{route('github')}}" class="btn btn-dark btn-block">Login with Github</a>
            </div>
        </div>
    </div>
@endsection