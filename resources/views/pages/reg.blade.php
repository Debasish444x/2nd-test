@extends('layouts.layout')
@section('content')
    <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        Name: <input type="text" name="name" id="name" value="{{old('name')}}">
        @error('name')
            {{$message}}
           
        @enderror
    </div>
    <div>
        Email: <input type="email" name="email" id="email">
        @error('email')
            {{$message}}
        @enderror
    </div>
    <div>
        File : <input type="file" name="file" id="file">
        @error('file')
        {{$message}}
    @enderror
    </div>
    <div>
        Password : <input type="password" name="pass" id="pass">
        @error('pass')
        {{$message}}
    @enderror
    </div>
    <div>
        Confirm Password : <input type="password" name="pass_confirmation" id="pass">
    </div>
    <div>
        <input type="submit" name="submit" id="submit">
    </div>
    </form>
@endsection