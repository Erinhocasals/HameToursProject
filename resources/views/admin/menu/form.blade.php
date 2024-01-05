<div class="form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="form-label">Título</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($menu->title) ? $menu->title : ''}}" required>
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('subtitle') ? 'has-error' : ''}}">
    <label for="title" class="form-label">Subtítulo</label>
    <input class="form-control" name="subtitle" type="text" id="subtitle" value="{{ isset($menu->subtitle) ? $menu->subtitle : ''}}">
    {!! $errors->first('subtitle', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group mb-3 {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="form-label">{{ 'Content' }}</label>
    <textarea class="form-control summernote" rows="5" name="content" type="textarea" id="content" >{{ isset($menu->content) ? $menu->content : ''}}</textarea>

    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div> --}}
<div class="form-group mb-3 {{ $errors->has('enabled') ? 'has-error' : ''}}">
    <label for="enabled" class="form-label">Habilitado</label>
    <div class="inline-flex">
        <div class="form-check mr-3">
            <input class="form-check-input" name="enabled" type="radio" value="1" {{ (isset($menu) && 1 == $menu->enabled) ? 'checked' : '' }}>
            <label class="form-check-label"> Sí</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="enabled" type="radio" value="0" @if (isset($menu)) {{ (0 == $menu->enabled) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
            <label class="form-check-label"> No</label>
        </div>
    </div>

    {!! $errors->first('enabled', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('show_in_nav') ? 'has-error' : ''}}">
    <label for="show_in_nav" class="form-label">Mostrar en Navegación Principal</label>
    <div class="inline-flex">
        <div class="form-check mr-3">
            <input class="form-check-input" name="show_in_nav" type="radio" value="1" {{ (isset($menu) && 1 == $menu->show_in_nav) ? 'checked' : '' }}>
            <label class="form-check-label"> Sí</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="show_in_nav" type="radio" value="0" @if (isset($menu)) {{ (0 == $menu->show_in_nav) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
            <label class="form-check-label"> No</label>
        </div>
    </div>

    {!! $errors->first('show_in_nav', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('show_in_footer') ? 'has-error' : ''}}">
    <label for="show_in_footer" class="form-label">Mostrar en Footer</label>
    <div class="inline-flex">
        <div class="form-check mr-3">
            <input class="form-check-input" name="show_in_footer" type="radio" value="1" {{ (isset($menu) && 1 == $menu->show_in_footer) ? 'checked' : '' }}>
            <label class="form-check-label"> Sí</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="show_in_footer" type="radio" value="0" @if (isset($menu)) {{ (0 == $menu->show_in_footer) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
            <label class="form-check-label"> No</label>
        </div>
    </div>

    {!! $errors->first('show_in_footer', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('grouped') ? 'has-error' : ''}}">
    <label for="grouped" class="form-label">Mostrar elementos agrupados </label>
    <div class="inline-flex">
        <div class="form-check mr-3">
            <input class="form-check-input" name="grouped" type="radio" value="1" {{ (isset($menu) && 1 == $menu->grouped) ? 'checked' : '' }}>
            <label class="form-check-label"> Sí</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="grouped" type="radio" value="0" @if (isset($menu)) {{ (0 == $menu->grouped) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
            <label class="form-check-label"> No</label>
        </div>
    </div>

    {!! $errors->first('grouped', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('show_in_home') ? 'has-error' : ''}}">
    <label for="show_in_home" class="form-label">Mostrar en Home </label>
    <div class="inline-flex">
        <div class="form-check mr-3">
            <input class="form-check-input" name="show_in_home" type="radio" value="1" {{ (isset($menu) && 1 == $menu->show_in_home) ? 'checked' : '' }}>
            <label class="form-check-label"> Sí</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="show_in_home" type="radio" value="0" @if (isset($menu)) {{ (0 == $menu->show_in_home) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
            <label class="form-check-label"> No</label>
        </div>
    </div>

    {!! $errors->first('show_in_home', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('style') ? 'has-error' : ''}}">
    <label for="style" class="form-label">Estilo</label>
    <div class="row align-items-center">
        <div class="w-full my-1">
            <select name="style" class="me-sm-2 default-select form-control wide" id="style" >
                <option value="">Seleccione ...</option>
                @foreach (json_decode('{"1":"Menú Pantalla Completa","2":"Menú Estándar"}', true) as $optionKey => $optionValue)
                    <option value="{{ $optionKey }}" {{ (isset($menu->style) && $menu->style == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {!! $errors->first('style', '<p class="help-block">:message</p>') !!}
</div>


<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
