<div class="form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="form-label">Título</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($slide->title) ? $slide->title : ''}}" required>
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('subtitle') ? 'has-error' : ''}}">
    <label for="subtitle" class="form-label">Subtítulo</label>
    <input class="form-control" name="subtitle" type="text" id="subtitle" value="{{ isset($slide->subtitle) ? $slide->subtitle : ''}}" >
    {!! $errors->first('subtitle', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group mb-3 {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="form-label">Descripción</label>
    <textarea class="form-control summernote" rows="5" name="content" type="textarea" id="content" >{{ isset($slide->content) ? $slide->content : ''}}</textarea>

    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div> --}}
<div class="form-group mb-3 {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="form-label">Imagen</label>
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($slide->image) ? $slide->image : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('enabled') ? 'has-error' : ''}}">
    <label for="enabled" class="form-label">Habilitado</label>
    <div class="inline-flex">
        <div class="form-check mr-3">
            <input class="form-check-input" name="enabled" type="radio" value="1" {{ (isset($slide) && 1 == $slide->enabled) ? 'checked' : '' }}>
            <label class="form-check-label"> Sí</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="enabled" type="radio" value="0" @if (isset($slide)) {{ (0 == $slide->enabled) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
            <label class="form-check-label"> No</label>
        </div>
    </div>

    {!! $errors->first('enabled', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 mt-10 {{ $errors->has('elements_id') ? 'has-error' : ''}}">
    <label for="elements_id" class="form-label">Elementos</label>

    <div class="row align-items-center">
        <div class="w-full my-1">
            <select name="elements_id" class="me-sm-2 multi-select form-control wide" id="elements_id" >
                <option value="-1">Seleccione ...</option>
                @if ($definitions)
                    <optgroup label="Definiciones">
                        @foreach ($definitions as $elem)
                            <option value="def-{{ $elem->id }}" {{ (isset($slide->slideable) && $slide->slideable->id == $elem->id) ? 'selected' : ''}}>{{ $elem->title }} <span class="badge badge-sm light badge-primary">{{ $elem->model_type_title }}</span> </option>
                        @endforeach
                    </optgroup>
                @endif
                @if ($entities)
                    <optgroup label="Productos">
                        @foreach ($entities as $elem)
                            <option value="ent-{{ $elem->id }}" {{ (isset($slide->slideable) && $slide->slideable->id == $elem->id) ? 'selected' : ''}}>{{ $elem->title }} <span class="badge badge-sm light badge-primary">{{ $elem->model_type_title }}</span> </option>
                        @endforeach
                    </optgroup>
                @endif
                @if ($packages)
                    <optgroup label="Paquetes">
                        @foreach ($packages as $elem)
                            <option value="pkg-{{ $elem->id }}" {{ (isset($slide->slideable) && $slide->slideable->id == $elem->id) ? 'selected' : ''}}>{{ $elem->title }} <span class="badge badge-sm light badge-primary">{{ $elem->model_type_title }}</span> </option>
                        @endforeach
                    </optgroup>
                @endif
            </select>
        </div>
    </div>
    {!! $errors->first('definitions_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
