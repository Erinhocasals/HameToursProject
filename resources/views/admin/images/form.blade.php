<div class="form-group mb-3 {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="form-label">{{ 'Image' }}</label>
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($image->url) ? $image->url : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('tag') ? 'has-error' : ''}}">
    <label for="tag" class="form-label">Etiqueta</label>
    <input class="form-control" name="tag" type="text" id="tag" value="{{ isset($image->tag) ? $image->tag : ''}}" >
    {!! $errors->first('tag', '<p class="help-block">:message</p>') !!}
</div>

<input class="form-control" name="imageable_id" type="hidden" id="imageable_id" value="{{ $imageable_id }}" >
<input class="form-control" name="imageable_type" type="hidden" id="imageable_type" value="{{ $imageable_type }}" >

<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
