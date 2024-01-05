<div class="form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="form-label">Título</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($package->title) ? $package->title : ''}}" required>
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('subtitle') ? 'has-error' : ''}}">
    <label for="subtitle" class="form-label">Subtítulo</label>
    <input class="form-control" name="subtitle" type="text" id="subtitle" value="{{ isset($package->subtitle) ? $package->subtitle : ''}}" >
    {!! $errors->first('subtitle', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('summary') ? 'has-error' : ''}}">
    <label for="summary" class="form-label">Resumen</label>
    <textarea class="form-control summernote" rows="5" name="summary" type="textarea" id="summary" >{{ isset($package->summary) ? $package->summary : ''}}</textarea>

    {!! $errors->first('summary', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="form-label">Descripción</label>
    <textarea class="form-control summernote" rows="5" name="content" type="textarea" id="content" >{{ isset($package->content) ? $package->content : ''}}</textarea>

    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('characteristics') ? 'has-error' : ''}}">
    <label for="characteristics" class="form-label">Características</label>
    <textarea class="form-control summernote" rows="5" name="characteristics" type="textarea" id="characteristics" >{{ isset($package->characteristics) ? $package->characteristics : ''}}</textarea>

    {!! $errors->first('characteristics', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('includes') ? 'has-error' : ''}}">
    <label for="includes" class="form-label">Incluye</label>
    <textarea class="form-control summernote" rows="5" name="includes" type="textarea" id="includes" >{{ isset($package->includes) ? $package->includes : ''}}</textarea>

    {!! $errors->first('includes', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="form-label">Imagen</label>
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($package->image) ? $package->image : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('enabled') ? 'has-error' : ''}}">
    <label for="enabled" class="form-label">Habilitado</label>
    <div class="inline-flex">
        <div class="form-check mr-3">
            <input class="form-check-input" name="enabled" type="radio" value="1" {{ (isset($package) && 1 == $package->enabled) ? 'checked' : '' }}>
            <label class="form-check-label"> Sí</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="enabled" type="radio" value="0" @if (isset($package)) {{ (0 == $package->enabled) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
            <label class="form-check-label"> No</label>
        </div>
    </div>
    {!! $errors->first('enabled', '<p class="help-block">:message</p>') !!}
</div>
@hasanyrole('super-admin|admin')
<div class="form-group mb-3 {{ $errors->has('starred') ? 'has-error' : ''}}">
    <label for="starred" class="form-label">Destacado</label>
    <div class="inline-flex">
        <div class="form-check mr-3">
            <input class="form-check-input" name="starred" type="radio" value="1" {{ (isset($package) && 1 == $package->starred) ? 'checked' : '' }}>
            <label class="form-check-label"> Sí</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="starred" type="radio" value="0" @if (isset($package)) {{ (0 == $package->starred) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
            <label class="form-check-label"> No</label>
        </div>
    </div>
    {!! $errors->first('starred', '<p class="help-block">:message</p>') !!}
</div>
@endhasanyrole
<div class="form-group mb-3 {{ $errors->has('definitions_id') ? 'has-error' : ''}}">
    <label for="definitions_id" class="form-label">Definiciones</label>

    <button type="button" class="js-programmatic-btn-select-all btn btn-xs btn-dark mb-2 ml-5" aria-label="Set Select2 option">
        Seleccionar todas
    </button>
    <button type="button" class="js-programmatic-btn-select-none btn btn-xs btn-danger mb-2" aria-label="Set Select2 option">
        Limpiar
    </button>

    <div class="row align-items-center">
        <div class="w-full my-1">
            <select name="definitions_id[]" class="me-sm-2 multi-select form-control wide" id="definitions_id" multiple="multiple" >
                @foreach ($definitions as $definition)
                    <option value="{{ $definition->id }}" {{ (isset($package->id) && $package->definitions->contains($definition->id)) ? 'selected' : ''}}>{{ $definition->title }}</option>
                @endforeach
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
