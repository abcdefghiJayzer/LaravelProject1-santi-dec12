@extends('layouts.main')
@section('content')
<x-pages.pageheader class="" />

<h1>Page 1</h1>

<div class="wrapper wrapper-content">


    <div>Are you sure you want to delete? <a href="{{route('pages.pages1')}}" class="button btn btn-primary btn-lg p">Cancel</a></div>
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

    <form method="POST" action="{{route('users.destroy',['user'=>$user->id])}}">
        @csrf
        @method('DELETE')
        <div class="row m-2">
            {{$user->name}}
        </div>
        <div class="row m-2">
            <input class="form-control button btn btn-primary btn-lg p" type="submit">
        </div>
    </form>

</div>
@endsection