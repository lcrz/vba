@extends('layouts.main')
@section('content')
<div class="w-full">
     
        <h2>
            {{__('Show')}} Categoria
        </h2>        
        <a class="btn-primary" href="{{ route('categorias.index') }}"> {{__('Back')}}</a>
        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $categoria->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Slug:</strong>
                            {{ $categoria->slug }}
                        </div>

</div>
@endsection
