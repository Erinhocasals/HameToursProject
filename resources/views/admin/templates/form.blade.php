<div class="form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="form-label">{{ 'Título' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($template->title) ? $template->title : ''}}" required>
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('subtitle') ? 'has-error' : ''}}">
    <label for="subtitle" class="form-label">{{ 'Subtítulo' }}</label>
    <input class="form-control" name="subtitle" type="text" id="subtitle" value="{{ isset($template->subtitle) ? $template->subtitle : ''}}" required>
    {!! $errors->first('subtitle', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="form-label">{{ 'Descripción' }}</label>
    <textarea class="form-control summernote" rows="5" name="content" type="textarea" id="content" >{{ isset($template->content) ? $template->content : ''}}</textarea>
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>

<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
