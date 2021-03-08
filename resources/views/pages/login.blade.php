@extends('layouts.layout')
@section('content')
    <form action="{{route('login')}}" method="post">
        @csrf
        Email : <input type="text" name="user_name" id="email" value="{{old('user_name')}}"><br>
        @error('user_name')
        {{$message}}
        @enderror </br>
        Pass : <input type="password" name="password" id="pass" value=""><br>
        @error('pass')
        {{$message}}
        @enderror <br>
        <input type="submit" name="submit" id="submit">
        {{-- @if (session('error'))
            {{session('error')}}
        @endif --}}

        {{session('error')}}
    </form>
@endsection
