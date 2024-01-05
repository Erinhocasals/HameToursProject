<div class="form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="form-label">Título</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($info->title) ? $info->title : ''}}" required>
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="form-label">Descripción</label>
    <textarea class="form-control summernote" rows="5" name="content" type="textarea" id="content" >{{ isset($info->content) ? $info->content : ''}}</textarea>

    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="form-label">Imagen</label>
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($info->image) ? $info->image : ''}}">
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('enabled') ? 'has-error' : ''}}">
    <label for="enabled" class="form-label">Habilitado</label>
    <div class="inline-flex">
        <div class="form-check mr-3">
            <input class="form-check-input" name="enabled" type="radio" value="1" {{ (isset($info) && 1 == $info->enabled) ? 'checked' : '' }}>
            <label class="form-check-label"> Sí</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="enabled" type="radio" value="0" @if (isset($info)) {{ (0 == $info->enabled) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
            <label class="form-check-label"> No</label>
        </div>
    </div>

    {!! $errors->first('enabled', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('show_in_home') ? 'has-error' : ''}}">
    <label for="show_in_home" class="form-label">Mostrar en Home</label>
    <div class="inline-flex">
        <div class="form-check mr-3">
            <input class="form-check-input" name="show_in_home" type="radio" value="1" {{ (isset($info) && 1 == $info->show_in_home) ? 'checked' : '' }}>
            <label class="form-check-label"> Sí</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="show_in_home" type="radio" value="0" @if (isset($info)) {{ (0 == $info->show_in_home) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
            <label class="form-check-label"> No</label>
        </div>
    </div>

    {!! $errors->first('show_in_home', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('footer') ? 'has-error' : ''}}">
    <label for="footer" class="form-label">Pie de página</label>
    <div class="inline-flex">
        <div class="form-check mr-3">
            <input class="form-check-input" name="footer" type="radio" value="1" {{ (isset($info) && 1 == $info->footer) ? 'checked' : '' }}>
            <label class="form-check-label"> Sí</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="footer" type="radio" value="0" @if (isset($info)) {{ (0 == $info->footer) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
            <label class="form-check-label"> No</label>
        </div>
    </div>

    {!! $errors->first('footer', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('menu_id') ? 'has-error' : ''}}">
    <label for="menu_id" class="form-label">Menú</label>
    <div class="row align-items-center">
        <div class="w-full my-1">
            <select name="menu_id" class="me-sm-2 default-select form-control wide" id="menu_id" >
                <option value="">Seleccione ...</option>
                @foreach ($menus as $m)
                    <option value="{{ $m->id }}" {{ (isset($info->menu) && $info->menu->menu_id == $m->id) ? 'selected' : ''}}>{{ $m->title }}</option>
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
