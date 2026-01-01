@extends('layouts.main')
@section('content')
    
    <div class="w-full">      
        @includeif('partials.errors')           
        <h2>{{__('Update')}} User</h2>            
        <form method="POST" action="{{ route('users.update', $user->id) }}"  role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            @include('user.form')
        </form>                    
    </div>  
@endsection
