<div class="form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="form-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($log->title) ? $log->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('enabled') ? 'has-error' : ''}}">
    <label for="enabled" class="form-label">{{ 'Enabled' }}</label>
    <div class="inline-flex">
    <div class="form-check mr-3">
        <input class="form-check-input" name="enabled" type="radio" value="1" {{ (isset($log) && 1 == $log->enabled) ? 'checked' : '' }}>
        <label class="form-check-label"> Sí</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" name="enabled" type="radio" value="0" @if (isset($log)) {{ (0 == $log->enabled) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
        <label class="form-check-label"> No</label>
    </div>
</div>

    {!! $errors->first('enabled', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('logable_id') ? 'has-error' : ''}}">
    <label for="logable_id" class="form-label">{{ 'Logable Id' }}</label>
    <input class="form-control" name="logable_id" type="number" id="logable_id" value="{{ isset($log->logable_id) ? $log->logable_id : ''}}" >
    {!! $errors->first('logable_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('logable_type') ? 'has-error' : ''}}">
    <label for="logable_type" class="form-label">{{ 'Logable Type' }}</label>
    <input class="form-control" name="logable_type" type="text" id="logable_type" value="{{ isset($log->logable_type) ? $log->logable_type : ''}}" >
    {!! $errors->first('logable_type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="form-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($log->user_id) ? $log->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
