@extends('layouts.main')
@section('content')
    <div class="w-full">
        <h2>{{__('Create')}} User</h2>

        <form method="POST" action="{{ route('users.store') }}"  role="form" enctype="multipart/form-data">
            @csrf
            @include('user.form')
        </form>                 
    </div>
@endsection
