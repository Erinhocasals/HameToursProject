<div class="form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="form-label">Título</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($entity->title) ? $entity->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('summary') ? 'has-error' : ''}}">
    <label for="summary" class="form-label">Resumen</label>
    <textarea class="form-control summernote" rows="5" name="summary" type="textarea" id="summary" >{{ isset($entity->summary) ? $entity->summary : ''}}</textarea>
    {!! $errors->first('summary', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="form-label">Descripción</label>
    <textarea class="form-control summernote" rows="5" name="content" type="textarea" id="content" >{{ isset($entity->content) ? $entity->content : ''}}</textarea>
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('characteristics') ? 'has-error' : ''}}">
    <label for="content" class="form-label">Características</label>
    <textarea class="form-control summernote" rows="5" name="characteristics" type="textarea" id="characteristics" >{{ isset($entity->characteristics) ? $entity->characteristics : ''}}</textarea>
    {!! $errors->first('characteristics', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('reservation_message') ? 'has-error' : ''}}">
    <label for="reservation_message" class="form-label">Texto Informativo Reserva</label>
    <textarea class="form-control summernote" rows="5" name="reservation_message" type="textarea" id="reservation_message" >{{ isset($entity->reservation_message) ? $entity->reservation_message : ''}}</textarea>
    {!! $errors->first('reservation_message', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="form-label">{{ 'Imagen' }}</label>
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($entity->image) ? $entity->image : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="row">
    <div class="form-group col-md-12 relative mb-3">
        <div id="map"></div>
        <pre id="coordinates" class="coordinates"></pre>
    </div>
    <div class="form-group mb-3 col-md-6  {{ $errors->has('latitude') ? 'has-error' : ''}}">
        <label for="latitude" class="form-label">{{ 'Latitud' }}</label>
        <input class="form-control" name="latitude" type="text" id="latitude" value="{{ isset($entity->latitude) ? $entity->latitude : ''}}" >
        {!! $errors->first('latitude', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group mb-3 col-md-6  {{ $errors->has('longitude') ? 'has-error' : ''}}">
        <label for="longitude" class="form-label">{{ 'Longitud' }}</label>
        <input class="form-control" name="longitude" type="text" id="longitude" value="{{ isset($entity->longitude) ? $entity->longitude : ''}}" >
        {!! $errors->first('longitude', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="row">
    <div class="form-group mb-3 col-md-6 {{ $errors->has('supplier') ? 'has-error' : ''}}">
        <label for="supplier" class="form-label">Proveedor</label>
        <input class="form-control" name="supplier" type="text" id="supplier" value="{{ isset($entity->supplier) ? $entity->supplier : ''}}" >
        {!! $errors->first('supplier', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group mb-3 col-md-6 {{ $errors->has('cost') ? 'has-error' : ''}}">
        <label for="cost" class="form-label">Costo</label>
        <input class="form-control" name="cost" type="text" id="cost" value="{{ isset($entity->cost) ? $entity->cost : ''}}" >
        {!! $errors->first('cost', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <div class="row">
        <div class="col-xl-6 mb-3">
            <div class="example">
                <p class="mb-1">Fecha de Inicio</p>
                <input name="date_start" class="datepicker-default form-control" id="datepicker" value="{{ isset($entity->date_start) ? date('j F, Y', strtotime($entity->date_start )) : '' }}">
            </div>
        </div>
        <div class="col-xl-6 mb-3">
            <div class="example">
                <p class="mb-1">Fecha de Fin</p>
                <input name="date_end" class="datepicker-default form-control" id="datepicker" value="{{ isset($entity->date_end) ? date('j F, Y', strtotime($entity->date_end )) : '' }}">
            </div>
        </div>
    </div>
</div>
<div class="form-group mb-3 {{ $errors->has('enabled') ? 'has-error' : ''}}">
    <label for="enabled" class="form-label w-full">Habilitada</label>
    <div class="inline-flex">
        <div class="form-check mr-3">
            <input class="form-check-input" name="enabled" type="radio" value="1" {{ (isset($entity) && 1 == $entity->enabled) ? 'checked' : '' }}>
            <label class="form-check-label"> Sí</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="enabled" type="radio" value="0" @if (isset($entity)) {{ (0 == $entity->enabled) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
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
                    <option value="{{ $category->id }}" {{ (isset($entity->category_id) && $entity->category_id == $category->id) ? 'selected' : ''}}>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group mb-3 {{ $errors->has('definition_id') ? 'has-error' : ''}}">
    <label for="definition_id" class="form-label">Definición</label>
    <div class="row align-items-center">
        <div class="w-full my-1">
            <select name="definition_id" class="me-sm-2 default-select form-control wide" id="definition_id" >
                <option value="">Seleccione ...</option>
                @foreach ($definitions as $definition)
                    <option value="{{ $definition->id }}" {{ (isset($entity->definition_id) && $entity->definition_id == $definition->id) ? 'selected' : ''}}>{{ $definition->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {!! $errors->first('definition_id', '<p class="help-block">:message</p>') !!}
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
                    <option value="{{ $definition->id }}" {{ (isset($entity->id) && $entity->definitions->contains($definition->id)) ? 'selected' : ''}}>{{ $definition->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {!! $errors->first('definitions_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('filters_id') ? 'has-error' : ''}}">
    <label for="filters_id" class="form-label">Filtros</label>

    <button type="button" class="js-programmatic-btn-select-all btn btn-xs btn-dark mb-2 ml-5" aria-label="Set Select2 option">
        Seleccionar todos
    </button>
    <button type="button" class="js-programmatic-btn-select-none btn btn-xs btn-danger mb-2" aria-label="Set Select2 option">
        Limpiar
    </button>

    <div class="row align-items-center">
        <div class="w-full my-1">
            <select name="filters_id[]" class="me-sm-2 multi-select form-control wide" id="filters_id" multiple="multiple" >
                @foreach ($filters as $group)
                    <optgroup label="{{ $group->title }}">
                        @foreach ($group->filters as $filter)
                            <option value="{{ $filter->id }}" {{ (isset($entity->id) && $entity->filters->contains($filter->id)) ? 'selected' : ''}}>{{ $filter->title }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
        </div>
    </div>
    {!! $errors->first('filters_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="alert alert-dark alert-dismissible fade show">
    <div class="media">
        <div class="media-body">
            <h5 class="mt-1 mb-3">Mensajería</h5>

            <div class="form-group mb-3 {{ $errors->has('bank_interaction') ? 'has-error' : ''}}">
                <label for="bank_interaction" class="form-label w-full">Permitir Mensajería</label>
                <div class="inline-flex">
                    <div class="form-check mr-3">
                        <input class="form-check-input" name="bank_interaction" type="radio" value="1" {{ (isset($entity) && 1 == $entity->bank_interaction) ? 'checked' : '' }}>
                        <label class="form-check-label"> Sí</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="bank_interaction" type="radio" value="0" @if (isset($entity)) {{ (0 == $entity->bank_interaction) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
                        <label class="form-check-label"> No</label>
                    </div>
                </div>
                {!! $errors->first('bank_interaction', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group mb-3 {{ $errors->has('bank_currency') ? 'has-error' : ''}}">
                <label for="bank_currency" class="form-label">Moneda de Entrega</label>
                <div class="row align-items-center">
                    <div class="w-full my-1">
                        <select name="bank_currency" class="single-select form-control wide" id="bank_currency" >
                            <option value="">Seleccione ...</option>
                            <option value="USD" {{ (isset($entity->bank_currency) && $entity->bank_currency == 'USD') ? 'selected' : ''}}>USD (EFECTIVO)</option>
                            <option value="EUR" {{ (isset($entity->bank_currency) && $entity->bank_currency == 'EUR') ? 'selected' : ''}}>EUR (EFECTIVO)</option>
                            <option value="CUP" {{ (isset($entity->bank_currency) && $entity->bank_currency == 'CUP') ? 'selected' : ''}}>CUP (EFECTIVO)</option>
                            <option value="CUP_TX" {{ (isset($entity->bank_currency) && $entity->bank_currency == 'CUP_TX') ? 'selected' : ''}}>CUP (TRANSFERENCIA)</option>
                            <option value="MLC" {{ (isset($entity->bank_currency) && $entity->bank_currency == 'MLC') ? 'selected' : ''}}>MLC (TRANSFERENCIA)</option>
                            <option value="CRIPTO" {{ (isset($entity->bank_currency) && $entity->bank_currency == 'CRIPTO') ? 'selected' : ''}}>CRIPTO (TRANSFERENCIA)</option>
                        </select>
                    </div>
                </div>
                {!! $errors->first('bank_currency', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group mb-3 {{ $errors->has('bank_delivery_amount') ? 'has-error' : ''}}">
                <label for="bank_delivery_amount" class="form-label">Cantidad a Entregar</label>
                <input class="form-control" name="bank_delivery_amount" type="number" id="bank_delivery_amount" value="{{ isset($entity->bank_delivery_amount) ? $entity->bank_delivery_amount : ''}}">
                {!! $errors->first('bank_delivery_amount', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
