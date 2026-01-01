<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <label class="block" for="name" >name  </label>                   
            <input class="inp" type="text" id="name" name="name" placeholder="" value="{{ $user->name ?? ''}}">                 
                
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label class="block" for="email" >email  </label>                   
            <input class="inp" type="text" id="email" name="email" placeholder="" value="{{ $user->email ?? ''}}">                 
                
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            <label class="block" for="password" >password  </label>                   
            <input class="inp" type="text" id="password" name="password" placeholder="" value="">                 
                
            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group mt-4">
      
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" value=""  id="admin" name="admin" class="sr-only peer" @checked(old('active', $user->admin))>
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Admin</span>
            </label>
                
            {!! $errors->first('admin', '<div class="invalid-feedback">:message</div>') !!}
        </div>

       

    </div>
    <div class="mt-4">
        <button type="submit" class="btn-primary">{{ __('Submit')}}</button>
    </div>
</div>