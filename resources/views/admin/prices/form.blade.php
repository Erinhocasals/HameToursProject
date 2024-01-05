<div class="form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="form-label">Título</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($price->title) ? $price->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('top_line') ? 'has-error' : ''}}">
    <label for="top_line" class="form-label">Línea Superior</label>
    <input class="form-control" name="top_line" type="text" id="top_line" value="{{ isset($price->top_line) ? $price->top_line : ''}}" >
    {!! $errors->first('top_line', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="form-label">Precio</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($price->price) ? $price->price : ''}}" required>
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('bottom_line') ? 'has-error' : ''}}">
    <label for="bottom_line" class="form-label">Lína Inferior</label>
    <textarea class="form-control summernote" rows="5" name="bottom_line" type="textarea" id="bottom_line" >{{ isset($price->bottom_line) ? $price->bottom_line : ''}}</textarea>
    {!! $errors->first('bottom_line', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('enabled') ? 'has-error' : ''}}">
    <label for="enabled" class="form-label">Habilitado</label>
    <div class="inline-flex">
        <div class="form-check mr-3">
            <input class="form-check-input" name="enabled" type="radio" value="1" {{ (isset($price) && 1 == $price->enabled) ? 'checked' : '' }}>
            <label class="form-check-label"> Sí</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="enabled" type="radio" value="0" @if (isset($price)) {{ (0 == $price->enabled) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
            <label class="form-check-label"> No</label>
        </div>
    </div>
    {!! $errors->first('enabled', '<p class="help-block">:message</p>') !!}
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3 {{ $errors->has('supplier') ? 'has-error' : ''}}">
            <label for="supplier" class="form-label">Proveedor</label>
            <input class="form-control" name="supplier" type="text" id="supplier" value="{{ isset($price->supplier) ? $price->supplier : ''}}" >
            {!! $errors->first('supplier', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3 {{ $errors->has('cost') ? 'has-error' : ''}}">
            <label for="cost" class="form-label">Costo</label>
            <input class="form-control" name="cost" type="text" id="cost" value="{{ isset($price->cost) ? $price->cost : ''}}" >
            {!! $errors->first('cost', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6 mb-3">
        <div class="example">
            <p class="mb-1">Fecha de Inicio</p>
            <input name="date_start" class="datepicker-default form-control" id="datepicker" value="{{ isset($price->date_start) ? date('j F, Y', strtotime($price->date_start )) : '' }}">
        </div>
    </div>
    <div class="col-xl-6 mb-3">
        <div class="example">
            <p class="mb-1">Fecha de Fin</p>
            <input name="date_end" class="datepicker-default form-control" id="datepicker" value="{{ isset($price->date_end) ? date('j F, Y', strtotime($price->date_end )) : '' }}">
        </div>
    </div>
</div>
<div class="form-group mb-3 {{ $errors->has('show_in_listing') ? 'has-error' : ''}}">
    <label for="show_in_listing" class="form-label">Mostrar en el listado</label>
    <div class="inline-flex">
        <div class="form-check mr-3">
            <input class="form-check-input" name="show_in_listing" type="radio" value="1" {{ (isset($price) && 1 == $price->show_in_listing) ? 'checked' : '' }}>
            <label class="form-check-label"> Sí</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="show_in_listing" type="radio" value="0" @if (isset($price)) {{ (0 == $price->show_in_listing) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
            <label class="form-check-label"> No</label>
        </div>
    </div>
    {!! $errors->first('show_in_listing', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('country_code') ? 'has-error' : ''}}">
    <label for="country_code" class="form-label">País</label>
    <div class="row align-items-center">
    <div class="w-full my-1">
        <select name="country_code" class="me-sm-2 default-select form-control wide" id="single-select" >
            <option value="">Todos los mercados ...</option>
            @foreach ($continents as $continent)
                <option value="wc-{{ $continent->code }}" {{ (isset($price->country_code) && $price->country_code == ("wc-" . $continent->code)) ? 'selected' : ''}}>{{ $continent->name }}</option>
            @endforeach
            @foreach ($countries as $country)
                <option value="{{ $country->code }}" {{ (isset($price->country_code) && $price->country_code == $country->code) ? 'selected' : ''}}>{{ $country->name }}</option>
            @endforeach
        </select>
    </div>
</div>
    {!! $errors->first('country_id', '<p class="help-block">:message</p>') !!}
</div>

<input class="form-control" name="priceable_id" type="hidden" id="priceable_id" value="{{ $priceable_id }}" >
<input class="form-control" name="priceable_type" type="hidden" id="priceable_type" value="{{ $priceable_type }}" >

<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
