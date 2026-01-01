<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <label class="block" for="nombre" >nombre  </label>                   
            <input class="inp  w-full" type="text" id="nombre" name="nombre" placeholder="" value="{{ $categoria->nombre ?? ''}}">                 
                
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label class="block" for="slug" >slug  </label>                   
            <input class="inp  w-full" type="text" id="slug" name="slug" placeholder="" value="{{ $categoria->slug ?? ''}}">                 
                
            {!! $errors->first('slug', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label class="block" for="descripcion" >descripcion  </label>                   
            <textarea class="inp w-full" type="text" id="descripcion" name="descripcion">{{ $categoria->descripcion ?? ''}}</textarea>  
                
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="mt-4">
        <button type="submit" class="btn-primary">{{ __('Submit')}}</button>
    </div>
</div>