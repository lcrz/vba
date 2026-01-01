

        <div class="form-group  my-2">
            <label class="block" for="titulo" >titulo  </label>                   
            <input class="inp w-full" type="text" id="titulo" name="titulo" placeholder="" value="{{ $macro->titulo ?? ''}}">                 
                
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group  my-2">
            <label class="block" for="descripcion" >descripcion  </label>                   
            <textarea class="inp w-full" type="text" id="descripcion" name="descripcion">{{ $macro->descripcion ?? ''}}</textarea>  
                
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group  my-2" x-data="{ code: '' }">
            <label class="block" for="instruccion" >instruccion  </label>                   
            <input class="hidden" type="text" id="instruccion" name="instruccion" placeholder="" value="{{ $macro->instruccion ?? ''}}">                 
            <div id="editorInstruccion" class="w-full h-52"  >
                        
            </div>    
            {!! $errors->first('instruccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    
        <div class="form-group  my-2">
            <label class="block" for="file" >file  </label>                   
            <input class="inp w-full" type="text" id="file" name="file" placeholder="" value="{{ $macro->file ?? ''}}">                 
                
            {!! $errors->first('file', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            <label class="block" for="codigo" >codigo  </label>                   
            <textarea class="inp w-full h-64" type="text" id="codigo" name="codigo" placeholder="" value="">{{ $macro->codigo ?? ''}}</textarea>   
            {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group  my-2">
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" value=""  id="activa" name="activa" class="sr-only peer" @checked(old('active', $macro->activa))>
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Activa</span>
            </label>
        </div>

        <div class="form-group">
            <label class="block" for="categoria_id" >categoria_id  </label>   
            <select name="categoria_id" id="categoria_id" class="inp w-full">
                <option value="">Seleccione una opción</option>        
                @foreach ($categorias as $cat)
                    <option value="{{ $cat->id }}"
                         @if ($macro->categoria_id == $cat->id)
                            selected="selected"
                        @endif  
                    >{{ $cat->nombre }}</option>        
                @endforeach
                
                
            </select>                
                
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

  
    <div class="mt-4">
        <button type="submit" class="btn-primary">{{ __('Submit')}}</button>
    </div>
    @push('scripts')
        <script>
            var quill = new Quill('#editorInstruccion', {
            theme: 'snow'
            });    
        
            quill.clipboard.dangerouslyPasteHTML( '{!! $macro->instruccion ?? '' !!}' ) ;
        </script>
    @endpush