<div class="form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="form-label">Nombre</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($entitycategory->title) ? $entitycategory->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('subtitle') ? 'has-error' : ''}}">
    <label for="subtitle" class="form-label">Subtítulo</label>
    <input class="form-control" name="subtitle" type="text" id="subtitle" value="{{ isset($entitycategory->subtitle) ? $entitycategory->subtitle : ''}}" >
    {!! $errors->first('subtitle', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('svg') ? 'has-error' : ''}}">
    <label for="svg" class="form-label">{{ 'Svg' }}</label>
    <input class="form-control" name="svg" type="file" id="svg" value="{{ isset($entitycategory->svg) ? $entitycategory->svg : ''}}" >
    {!! $errors->first('svg', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="form-label">Descripción</label>
    <textarea class="form-control summernote" rows="5" name="content" type="textarea" id="content" >{{ isset($entitycategory->content) ? $entitycategory->content : ''}}</textarea>
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('enabled') ? 'has-error' : ''}}">
    <label for="enabled" class="form-label">Habilitado</label>
    <div class="inline-flex">
        <div class="form-check mr-3">
            <input class="form-check-input" name="enabled" type="radio" value="1" {{ (isset($entitycategory) && 1 == $entitycategory->enabled) ? 'checked' : '' }}>
            <label class="form-check-label"> Sí</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="enabled" type="radio" value="0" @if (isset($entitycategory)) {{ (0 == $entitycategory->enabled) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
            <label class="form-check-label"> No</label>
        </div>
    </div>
    {!! $errors->first('enabled', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="form-label">Categorías</label>

    <button type="button" class="js-programmatic-btn-select-all btn btn-xs btn-dark mb-2 ml-5" aria-label="Set Select2 option">
        Seleccionar todas
    </button>
    <button type="button" class="js-programmatic-btn-select-none btn btn-xs btn-danger mb-2" aria-label="Set Select2 option">
        Limpiar
    </button>

    <div class="row align-items-center">
        <div class="w-full my-1">
            <select name="categories_id[]" class="me-sm-2 multi-select form-control wide" id="category_id" multiple="multiple" >
                @foreach ($categories as $selectCategory)
                    <option value="{{ $selectCategory->id }}" {{ (isset($entitycategory->id) && $entitycategory->categories->contains($selectCategory->id)) ? 'selected' : ''}}>{{ $selectCategory->title }}</option>
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
