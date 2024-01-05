<div class="form-group mb-3 {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="form-label">Nombre</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($user->name) ? $user->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="form-label">Correo electrónico</label>
    <input class="form-control" name="email" type="email" id="email" value="{{ isset($user->email) ? $user->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="form-label">Teléfono</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($user->phone) ? $user->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="form-label">Contraseña</label>
    <input class="form-control" name="password" type="password" id="password" >
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group mb-3 {{ $errors->has('role') ? 'has-error' : ''}}">
    <label for="roles" class="form-label">Rol</label>
    <div class="row align-items-center">
    <div class="w-full my-1">
        <select name="roles" class="capitalize me-sm-2 default-select form-control wide" id="roles" >
            <option value="">Seleccione ...</option>
            @foreach ($roles as $role)
                @if ($role->id != 14)
                    <option value="{{ $role->id }}" {{ isset($user) && ($user->hasRole($role->name)) ? 'selected' : ''}}>{{ $role->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>
    {!! $errors->first('roles', '<p class="help-block">:message</p>') !!}
</div> --}}


<div class="form-group mb-3 {{ $errors->has('roles_id') ? 'has-error' : ''}}">
    <label for="roles_id" class="form-label">Roles</label>

    <button type="button" class="js-programmatic-btn-select-all btn btn-xs btn-dark mb-2 ml-5" aria-label="Set Select2 option">
        Seleccionar todos
    </button>
    <button type="button" class="js-programmatic-btn-select-none btn btn-xs btn-danger mb-2" aria-label="Set Select2 option">
        Limpiar
    </button>

    <div class="row align-items-center">
        <div class="w-full my-1">
            <select name="roles[]" class="me-sm-2 multi-select form-control wide" id="roles_id" multiple="multiple" >
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ (isset($user->id) && $user->hasRole($role->name)) ? 'selected' : ''}}>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {!! $errors->first('roles_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
