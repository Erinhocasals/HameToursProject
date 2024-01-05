<div class="basic-form">
    <div class="form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}">
        <label for="title" class="form-label">Nombre</label>
        <input class="form-control" name="title" type="text" id="title" value="{{ isset($category->title) ? $category->title : ''}}" required>
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group mb-3 {{ $errors->has('subtitle') ? 'has-error' : ''}}">
        <label for="subtitle" class="form-label">Subtítulo</label>
        <input class="form-control" name="subtitle" type="text" id="subtitle" value="{{ isset($category->subtitle) ? $category->subtitle : ''}}" >
        {!! $errors->first('subtitle', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group mb-3 {{ $errors->has('content') ? 'has-error' : ''}}">
        <label for="content" class="form-label">Descripción</label>
        <textarea class="form-control summernote" rows="5" name="content" type="textarea" id="content" >{{ isset($category->content) ? $category->content : ''}}</textarea>
        {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group mb-3 {{ $errors->has('entities_intro') ? 'has-error' : ''}}">
        <label for="entities_intro" class="form-label">Sección Productos</label>
        <textarea class="form-control summernote" rows="5" name="entities_intro" type="textarea" id="entities_intro" >{{ isset($category->entities_intro) ? $category->entities_intro : ''}}</textarea>
        {!! $errors->first('entities_intro', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group mb-3 {{ $errors->has('reservation_message') ? 'has-error' : ''}}">
        <label for="reservation_message" class="form-label">Texto Informativo Reservas</label>
        <textarea class="form-control summernote" rows="5" name="reservation_message" type="textarea" id="reservation_message" >{{ isset($category->reservation_message) ? $category->reservation_message : ''}}</textarea>
        {!! $errors->first('reservation_message', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group mb-3 {{ $errors->has('preview') ? 'has-error' : ''}}">
        <label for="preview" class="form-label">Imagen</label>
        <input class="form-control" name="preview" type="file" id="preview" value="{{ isset($category->preview->url) ? $category->$preview->url : ''}}" >
        {!! $errors->first('preview', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group mb-3 {{ $errors->has('enabled') ? 'has-error' : ''}}">
        <label for="enabled" class="form-label w-full">Habilitada</label>
        <div class="inline-flex">
            <div class="form-check mr-3">
                <input class="form-check-input" name="enabled" type="radio" value="1" {{ (isset($category) && 1 == $category->enabled) ? 'checked' : '' }}>
                <label class="form-check-label"> Sí</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="enabled" type="radio" value="0" @if (isset($category)) {{ (0 == $category->enabled) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
                <label class="form-check-label"> No</label>
            </div>
        </div>
        {!! $errors->first('enabled', '<p class="help-block">:message</p>') !!}
    </div>
    @hasanyrole('super-admin|admin')
        <div class="form-group mb-3 {{ $errors->has('show_in_home') ? 'has-error' : ''}}">
            <label for="show_in_home" class="form-label w-full">Mostrar en Home</label>
            <div class="inline-flex">
                <div class="form-check mr-3">
                    <input class="form-check-input" name="show_in_home" type="radio" value="1" {{ (isset($category) && 1 == $category->show_in_home) ? 'checked' : '' }}>
                    <label class="form-check-label"> Sí</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="show_in_home" type="radio" value="0" @if (isset($category)) {{ (0 == $category->show_in_home) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
                    <label class="form-check-label"> No</label>
                </div>
            </div>
            {!! $errors->first('show_in_home', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group mb-3 {{ $errors->has('group_agencies') ? 'has-error' : ''}}">
            <label for="group_agencies" class="form-label w-full">Listar Agencias</label>
            <div class="inline-flex">
                <div class="form-check mr-3">
                    <input class="form-check-input" name="group_agencies" type="radio" value="1" {{ (isset($category) && 1 == $category->group_agencies) ? 'checked' : '' }}>
                    <label class="form-check-label"> Sí</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="group_agencies" type="radio" value="0" @if (isset($category)) {{ (0 == $category->group_agencies) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
                    <label class="form-check-label"> No</label>
                </div>
            </div>
            {!! $errors->first('group_agencies', '<p class="help-block">:message</p>') !!}
        </div>
    @endhasanyrole
    <div class="form-group mb-3 {{ $errors->has('category_id') ? 'has-error' : ''}}">
        <label for="category_id" class="form-label">Categoría Superior</label>
        <div class="row align-items-center">
            <div class="w-full my-1">
                <select name="category_id" class="form-control wide single-select" id="category_id" >
                    <option value="">Seleccione ...</option>
                    @foreach ($categories as $cat)
                        @if (!isset($category) || (isset($category) && $category->id != $cat->id))
                        <option value="{{ $cat->id }}" {{ (isset($category->category_id) && $category->category_id == $cat->id) ? 'selected' : ''}}>{{ $cat->title }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
    @hasanyrole('super-admin|admin')
        <div class="form-group mb-3 {{ $errors->has('menu_id') ? 'has-error' : ''}}">
            <label for="menu_id" class="form-label">Menú</label>
            <div class="row align-items-center">
                <div class="w-full my-1">
                    <select name="menu_id" class="single-select form-control wide" id="menu_id" >
                        <option value="">Seleccione ...</option>
                        @foreach ($menus as $m)
                            <option value="{{ $m->id }}" {{ (isset($category->menu) && $category->menu->menu_id == $m->id) ? 'selected' : ''}}>{{ $m->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {!! $errors->first('menu_id', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group mb-3 {{ $errors->has('editors_id') ? 'has-error' : ''}}">
            <label for="editors_id" class="form-label">Editores</label>

            <button type="button" class="js-programmatic-btn-select-all btn btn-xs btn-dark mb-2 ml-5" aria-label="Set Select2 option">
                Seleccionar todos
            </button>
            <button type="button" class="js-programmatic-btn-select-none btn btn-xs btn-danger mb-2" aria-label="Set Select2 option">
                Limpiar
            </button>

            <div class="row align-items-center">
                <div class="w-full my-1">
                    <select name="editors_id[]" class="me-sm-2 multi-select form-control wide" id="editors_id" multiple="multiple" >
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ (isset($category->id) && $category->editors->pluck('user_id')->contains($user->id)) ? 'selected' : ''}}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {!! $errors->first('editors_id', '<p class="help-block">:message</p>') !!}
        </div>
    @endhasanyrole

    <input type="hidden" name="type" id="type" value="{{ isset($category->type) ? $category->type : $type }} " />

    <div class="row">
        <div class="text-right form-group mt-9">
            <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
        </div>
    </div>
</div>
