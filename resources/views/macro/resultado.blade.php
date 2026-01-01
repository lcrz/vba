@extends('layouts.main')
@section('content')
    <div class="w-full">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <h2 id="card_title" class="text-2xl font-semibold">
                                Resultado de la busqueda
                                ({{
                                    $macros->total();
                                    }})
                            </h2>                              
                            
                        </div>
                        <p>[{{request()->get('texto')}}]</p>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    @if (count($macros) == 0)
                    <div class="alert-danger">
                        <p>No se encontraron resultados</p>
                    </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                   
                            @foreach ($macros as $macro)
                                @include('macro.preview', [
                                    'macro' => $macro
                                ])   
                            @endforeach                         
                        </div>
                    </div>
                </div>
                {!! $macros->links() !!}
            </div>
        </div>
    </div>


@endsection
