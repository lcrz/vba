@extends('layouts.main')
@section('content')
    
    <div class="w-full">      
        @includeif('partials.errors')           
        <h2>{{__('Update')}} Categoria</h2>            
        <form method="POST" action="{{ route('categorias.update', $categoria->id) }}"  role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            @include('categoria.form')
        </form>                    
    </div>  
@endsection
