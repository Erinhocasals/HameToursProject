<div class="form-group mb-3 {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="form-label">Nombre</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($permission->name) ? $permission->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group mb-3 {{ $errors->has('guard_name') ? 'has-error' : ''}}">
    <label for="guard_name" class="form-label">{{ 'Guard Name' }}</label>
    <input class="form-control" name="guard_name" type="text" id="guard_name" value="{{ isset($permission->guard_name) ? $permission->guard_name : ''}}" >
    {!! $errors->first('guard_name', '<p class="help-block">:message</p>') !!}
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
            <select name="roles_id[]" class="me-sm-2 multi-select form-control wide" id="roles_id" multiple="multiple" >
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ (isset($permission->id) && $permission->roles->contains($role->id)) ? 'selected' : ''}}>{{ $role->name }}</option>
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
