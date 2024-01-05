<div class="form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="form-label">Título</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($intro->title) ? $intro->title : ''}}" required>
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('subtitle') ? 'has-error' : ''}}">
    <label for="subtitle" class="form-label">Subtítulo</label>
    <input class="form-control" name="subtitle" type="text" id="subtitle" value="{{ isset($intro->subtitle) ? $intro->subtitle : ''}}" >
    {!! $errors->first('subtitle', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="form-label">Descripción (máx: 800 caracteres)</label>
    <textarea class="form-control summernote" rows="5" name="content" type="textarea" id="content" >{{ isset($intro->content) ? $intro->content : ''}}</textarea>
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('big_image') ? 'has-error' : ''}}">
    <label for="big_image" class="form-label">Imagen Grande</label>
    <input class="form-control" name="big_image" type="file" id="big_image" value="{{ isset($intro->big_image) ? $intro->big_image : ''}}" >
    {!! $errors->first('big_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('small_image') ? 'has-error' : ''}}">
    <label for="small_image" class="form-label">Imagen Pequeña</label>
    <input class="form-control" name="small_image" type="file" id="small_image" value="{{ isset($intro->small_image) ? $intro->small_image : ''}}" >
    {!! $errors->first('small_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('enabled') ? 'has-error' : ''}}">
    <label for="enabled" class="form-label">Habilitado</label>
    <div class="inline-flex">
    <div class="form-check mr-3">
        <input class="form-check-input" name="enabled" type="radio" value="1" {{ (isset($intro) && 1 == $intro->enabled) ? 'checked' : '' }}>
        <label class="form-check-label"> Sí</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" name="enabled" type="radio" value="0" @if (isset($intro)) {{ (0 == $intro->enabled) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
        <label class="form-check-label"> No</label>
    </div>
</div>
    {!! $errors->first('enabled', '<p class="help-block">:message</p>') !!}
</div>

<input class="form-control" name="introable_id" type="hidden" id="introable_id" value="{{ $introable_id }}" >
<input class="form-control" name="introable_type" type="hidden" id="introable_type" value="{{ $introable_type }}" >

<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
