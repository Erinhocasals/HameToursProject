<div class="form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="form-label">Título</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($blog->title) ? $blog->title : ''}}" required>
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('summary') ? 'has-error' : ''}}">
    <label for="summary" class="form-label">Resumen</label>
    <textarea class="form-control summernote" rows="5" name="summary" type="textarea" id="summary" >{{ isset($blog->summary) ? $blog->summary : ''}}</textarea>

    {!! $errors->first('summary', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="form-label">Descripción</label>
    <textarea class="form-control summernote" rows="5" name="content" type="textarea" id="content" >{{ isset($blog->content) ? $blog->content : ''}}</textarea>

    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="form-label">Imagen</label>
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($blog->image) ? $blog->image : ''}}">
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('enabled') ? 'has-error' : ''}}">
    <label for="enabled" class="form-label">Habilitado</label>
    <div class="inline-flex">
        <div class="form-check mr-3">
            <input class="form-check-input" name="enabled" type="radio" value="1" {{ (isset($blog) && 1 == $blog->enabled) ? 'checked' : '' }}>
            <label class="form-check-label"> Sí</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="enabled" type="radio" value="0" @if (isset($blog)) {{ (0 == $blog->enabled) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
            <label class="form-check-label"> No</label>
        </div>
    </div>

    {!! $errors->first('enabled', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group mb-3 {{ $errors->has('author') ? 'has-error' : ''}}">
    <label for="author" class="form-label">{{ 'Author' }}</label>
    <input class="form-control" name="author" type="text" id="author" value="{{ isset($blog->author) ? $blog->author : ''}}" >
    {!! $errors->first('author', '<p class="help-block">:message</p>') !!}
</div> --}}
<div class="form-group mb-3 {{ $errors->has('menu_id') ? 'has-error' : ''}}">
    <label for="menu_id" class="form-label">Menú</label>
    <div class="row align-items-center">
        <div class="w-full my-1">
            <select name="menu_id" class="me-sm-2 default-select form-control wide" id="menu_id" >
                <option value="">Seleccione ...</option>
                @foreach ($menus as $m)
                    <option value="{{ $m->id }}" {{ (isset($blog->menu) && $blog->menu->menu_id == $m->id) ? 'selected' : ''}}>{{ $m->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {!! $errors->first('menu_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
