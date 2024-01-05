<div class="form-group mb-3 {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="form-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($entity-package->name) ? $entity-package->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="form-label">{{ 'Content' }}</label>
    <input class="form-control" name="content" type="text" id="content" value="{{ isset($entity-package->content) ? $entity-package->content : ''}}" >
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>


<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
