<div class="form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="form-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($social->title) ? $social->title : ''}}" required>
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="form-label">Icono</label>
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($text->icono) ? $text->icono->url : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('url') ? 'has-error' : ''}}">
    <label for="url" class="form-label">{{ 'Url' }}</label>
    <input class="form-control" name="url" type="url" id="url" value="{{ isset($social->url) ? $social->url : ''}}" required>
    {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('enabled') ? 'has-error' : ''}}">
    <label for="enabled" class="form-label">Habilitado</label>
    <div class="inline-flex">
    <div class="form-check mr-3">
        <input class="form-check-input" name="enabled" type="radio" value="1" {{ (isset($social) && 1 == $social->enabled) ? 'checked' : '' }}>
        <label class="form-check-label"> Sí</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" name="enabled" type="radio" value="0" @if (isset($social)) {{ (0 == $social->enabled) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
        <label class="form-check-label"> No</label>
    </div>
</div>

    {!! $errors->first('enabled', '<p class="help-block">:message</p>') !!}
</div>


<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
