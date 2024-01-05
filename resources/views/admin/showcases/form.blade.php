<div class="form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="form-label">Título</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($showcase->title) ? $showcase->title : ''}}" required>
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('subtitle') ? 'has-error' : ''}}">
    <label for="subtitle" class="form-label">Subtítulo</label>
    <input class="form-control" name="subtitle" type="text" id="subtitle" value="{{ isset($showcase->subtitle) ? $showcase->subtitle : ''}}" >
    {!! $errors->first('subtitle', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group mb-3 {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="form-label">Descripción</label>
    <textarea class="form-control summernote" rows="5" name="content" type="textarea" id="content" >{{ isset($showcase->content) ? $showcase->content : ''}}</textarea>
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div> --}}
<div class="form-group mb-3 {{ $errors->has('svg') ? 'has-error' : ''}}">
    <label for="svg" class="form-label">Icono</label>
    <input class="form-control" name="svg" type="file" id="svg" value="{{ isset($showcase->svg) ? $showcase->svg : ''}}" >
    {!! $errors->first('svg', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="form-label">{{ 'Image' }}</label>
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($showcase->image) ? $showcase->image : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('enabled') ? 'has-error' : ''}}">
    <label for="enabled" class="form-label">Habilitado</label>
    <div class="inline-flex">
    <div class="form-check mr-3">
        <input class="form-check-input" name="enabled" type="radio" value="1" {{ (isset($showcase) && 1 == $showcase->enabled) ? 'checked' : '' }}>
        <label class="form-check-label"> Sí</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" name="enabled" type="radio" value="0" @if (isset($showcase)) {{ (0 == $showcase->enabled) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
        <label class="form-check-label"> No</label>
    </div>
</div>
    {!! $errors->first('enabled', '<p class="help-block">:message</p>') !!}
</div>

<input class="form-control" name="showcaseable_id" type="hidden" id="showcaseable_id" value="{{ $showcaseable_id }}" >
<input class="form-control" name="showcaseable_type" type="hidden" id="showcaseable_type" value="{{ $showcaseable_type }}" >

<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
