<div class="form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="form-label">Título</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($filter->title) ? $filter->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('enabled') ? 'has-error' : ''}}">
    <label for="enabled" class="form-label w-full">Habilitado</label>
    <div class="inline-flex">
        <div class="form-check mr-3">
            <input class="form-check-input" name="enabled" type="radio" value="1" {{ (isset($filter) && 1 == $filter->enabled) ? 'checked' : '' }}>
            <label class="form-check-label"> Sí</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="enabled" type="radio" value="0" @if (isset($filter)) {{ (0 == $filter->enabled) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
            <label class="form-check-label"> No</label>
        </div>
    </div>
    {!! $errors->first('enabled', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="form-label">Categoría</label>
    <div class="row align-items-center">
        <div class="w-full my-1">
            <select name="category_id" class="single-select form-control wide" id="category_id" >
                <option value="">Seleccione ...</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ (isset($filter->category_id) && $filter->category_id == $category->id) ? 'selected' : ''}}>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
