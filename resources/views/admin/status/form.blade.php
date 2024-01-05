<div class="form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="form-label">Título</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($status->title) ? $status->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group mb-3 {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="form-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="number" id="status" value="{{ isset($status->status) ? $status->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div> --}}
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
                    <option value="{{ $definition->id }}" {{ (isset($status->id) && $status->definitions->contains($definition->id)) ? 'selected' : ''}}>{{ $definition->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {!! $errors->first('definitions_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('color') ? 'has-error' : ''}}">
    <label for="color" class="form-label">{{ 'Color' }}</label> <br>
    <input class="as_colorpicker form-control" name="color" type="text" id="color" value="{{ isset($status->color) ? $status->color : '#ff8c00'}}" >
    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
</div>

<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
