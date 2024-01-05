<div class="form-group mb-3 {{ $errors->has('identity') ? 'has-error' : ''}}">
    <label for="identity" class="form-label">{{ 'Identity' }}</label>
    <input class="form-control" name="identity" type="text" id="identity" value="{{ isset($kyc->identity) ? $kyc->identity : ''}}" >
    {!! $errors->first('identity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="form-label">{{ 'Address' }}</label>
    <input class="form-control" name="address" type="text" id="address" value="{{ isset($kyc->address) ? $kyc->address : ''}}" >
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>


<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
