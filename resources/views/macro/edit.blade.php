@extends('layouts.main')
@section('content')
    @includeif('partials.errors')
    <div class="w-full">
    <h2>{{__('Update')}} Macro</h2>
    
        <form id="macroForm" method="POST" action="{{ route('macros.update', $macro->id) }}" @submit.prevent="sendMacroForm()" role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            @include('macro.form')
        </form>
    </div>  
    
    <script>
        function sendMacroForm()
        {
            const quillEditor = document.querySelector("#editorInstruccion");
            const html = quillEditor.children[0].innerHTML;
            document.querySelector("#instruccion").value = html;

            const form = document.querySelector("#macroForm");
            form.submit();
        }
    </script>
            
@endsection

