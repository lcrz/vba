@extends('layouts.main')
@section('content')
<div class="w-full">
     
        <h2>
            {{__('Show')}} User
        </h2>        
        <a class="btn-primary" href="{{ route('users.index') }}"> {{__('Back')}}</a>
        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Two Factor Secret:</strong>
                            {{ $user->two_factor_secret }}
                        </div>
                        <div class="form-group">
                            <strong>Two Factor Recovery Codes:</strong>
                            {{ $user->two_factor_recovery_codes }}
                        </div>
                        <div class="form-group">
                            <strong>Two Factor Confirmed At:</strong>
                            {{ $user->two_factor_confirmed_at }}
                        </div>
                        <div class="form-group">
                            <strong>Current Team Id:</strong>
                            {{ $user->current_team_id }}
                        </div>
                        <div class="form-group">
                            <strong>Empresa Id:</strong>
                            {{ $user->empresa_id }}
                        </div>
                        <div class="form-group">
                            <strong>Profile Photo Path:</strong>
                            {{ $user->profile_photo_path }}
                        </div>
                        <div class="form-group">
                            <strong>Google Id:</strong>
                            {{ $user->google_id }}
                        </div>
                        <div class="form-group">
                            <strong>Admin:</strong>
                            {{ $user->admin }}
                        </div>

</div>


















@endsection
