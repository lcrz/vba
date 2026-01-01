@extends('layouts.main')
@section('content')
<div class="w-full">
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"  style="display: flex; justify-content: space-between; align-items: center;">
                        <h1>
                            {{ $macro->titulo }}
                        </h1>
                        
                        
                    </div>

                    <div class="card-body">
                        <p>{{ $macro->descripcion }}</p>    
                        
                        @if ( strlen(trim($macro->instruccion)) > 25)
                            <h2>Instrucciones</h2>
                            {!! $macro->instruccion !!}    
                        @endif
                        
                        <h2>Macro:</h2>
                        <pre><code class="language-php">{{ $macro->codigo }}</code></pre>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
