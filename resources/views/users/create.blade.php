@extends('layouts.main')
@section('content')
<x-pages.pageheader class="" />

<h1>Page 1</h1>

<div class="wrapper wrapper-content">


    <div>Add new student <a href="{{route('pages.pages1')}}" class="button btn btn-primary btn-lg p">Cancel</a></div>
</div>
<div cs="ibox-content">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error )
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

    @endif

    @if (session('msg'))
    <div class="alert alert-{{session('msg')[0]}}">
        {{session('msg')[1]}}
    </div>
    @endif

    <form method="POST" action="{{route('users.store')}}">
        @csrf
        <div class="row m-2">
            <input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Full Name">
        </div>
        <div class="row m-2">
            <input class="form-control" type="email" name="email" value="{{old('email')}}" placeholder="Email">
        </div>
        <div class="row m-2">
            <input class="form-control button btn btn-primary btn-lg p" type="submit" name="ADD">
        </div>
    </form>

</div>
@endsection