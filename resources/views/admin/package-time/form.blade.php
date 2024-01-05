<div class="form-group mb-3 {{ $errors->has('time') ? 'has-error' : ''}}">
    <label for="time" class="form-label">Tiempo</label>
    <input class="form-control" name="time" type="text" id="time" value="{{ isset($time->time) ? $time->time : ''}}" >
    {!! $errors->first('time', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('definition') ? 'has-error' : ''}}">
    <label for="definition" class="form-label">Definición</label>
    <input class="form-control" name="definition" type="text" id="definition" value="{{ isset($time->definition) ? $time->definition : ''}}" >
    {!! $errors->first('definition', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="form-label">Descripción</label>
    <textarea class="form-control summernote" rows="5" name="content" type="textarea" id="content" >{{ isset($time->content) ? $time->content : ''}}</textarea>
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3">
    <label for="style" class="form-label">Estilo</label>
    <select name="style" class="me-sm-2 default-select form-control wide" id="style" >
        <option value="">Seleccione ...</option>
        <option value="0" @if (isset($time) && $time->style == 0 ) selected @endif >Presentación</option>
        <option value="1" @if (isset($time) && $time->style == 1 ) selected @endif >Itinerario</option>
    </select>
</div>
<br>
<div class="form-group mb-3 mt-10 {{ $errors->has('elements_id') ? 'has-error' : ''}}">
    <label for="elements_id" class="form-label">Elementos</label>
    {{-- {{ $time->contents }} --}}

    <button type="button" class="js-programmatic-btn-select-all btn btn-xs btn-dark mb-2 ml-5" aria-label="Set Select2 option">
        Seleccionar todos
    </button>
    <button type="button" class="js-programmatic-btn-select-none btn btn-xs btn-danger mb-2" aria-label="Set Select2 option">
        Limpiar
    </button>
    <div class="row align-items-center">
        <div class="w-full my-1">
            <select name="elements_id[]" class="me-sm-2 multi-select form-control wide" id="elements_id" multiple="multiple" >
                @if ($definitions)
                    <optgroup label="Definiciones">
                        @foreach ($definitions as $elem)
                            @php $flag = false; @endphp

                            @if (isset($time))
                                @foreach ($time->contents as $content)
                                    @if ($content->contentable_id == $elem->id && $content->contentable_type == 'App\\Models\\Category')
                                        @php $flag = true; @endphp
                                    @endif
                                @endforeach
                            @endif

                            <option value="def-{{ $elem->id }}" {{ (isset($time->id) && $flag) ? 'selected' : ''}}>
                                {{ $elem->title }} <span class="badge badge-sm light badge-primary">{{ $elem->model_type_title }}</span>
                            </option>
                        @endforeach
                    </optgroup>
                @endif
                @if ($entities)
                    <optgroup label="Productos">
                        @foreach ($entities as $elem)
                            @php $flag = false; @endphp

                            @if (isset($time))
                                @foreach ($time->contents as $content)
                                    @if ($content->contentable_id == $elem->id && $content->contentable_type == 'App\\Models\\Entity')
                                        @php $flag = true; @endphp
                                    @endif
                                @endforeach
                            @endif

                            <option value="ent-{{ $elem->id }}" {{ (isset($time->id) && $flag) ? 'selected' : ''}}>
                                {{ $elem->title }} <span class="badge badge-sm light badge-primary">{{ $elem->model_type_title }}</span>
                            </option>
                        @endforeach
                    </optgroup>
                @endif
            </select>
        </div>
    </div>
    {!! $errors->first('definitions_id', '<p class="help-block">:message</p>') !!}
</div>


<input class="form-control" name="package_id" type="hidden" id="package_id" value="{{ $package->id }}" >

<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
