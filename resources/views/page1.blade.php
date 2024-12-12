@extends('layouts.main')
@section('content')
<x-pages.pageheader class="" />

<h1>Page 1</h1>

<div class="wrapper wrapper-content">

    @if (session('msg'))
    <div class="alert alert-{{session('msg')[0]}}">
        {{session('msg')[1]}}
    </div>
    @endif



    <div class="">Add Student<a href="{{route('users.create')}}" class="button btn btn-primary btn-lg p">Create</a></div>

    <table class="table table-striped">
        <thead>
            <tr class="">
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $cnt = 0; @endphp
            @foreach ($users as $user )
            <tr>
                <td>{{++$cnt}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>
                    <a href="{{route('users.edit',['user'=>$user->id])}}" class="button btn btn-warning btn-lg">Update</a>
                    <a href="{{route('users.show',$user->id)}}" class="button btn btn-danger btn-lg">Delete</a>
                </td>



            </tr>
            @endforeach
        </tbody>

    </table>
    <tfoot>
        <td colspan="4">{{$users->links()}}</td>
    </tfoot>
</div>
@endsection