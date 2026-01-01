@extends('layouts.main')
@section('content')
    <div class="w-full">
        <h2>{{__('Create')}} Categoria</h2>

        <form method="POST" action="{{ route('categorias.store') }}"  role="form" enctype="multipart/form-data">
            @csrf
            @include('categoria.form')
        </form>                 
    </div>
@endsection
