<div class="form-group mb-3 {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="form-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($beneficiary->name) ? $beneficiary->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('identification') ? 'has-error' : ''}}">
    <label for="identification" class="form-label">{{ 'Identification' }}</label>
    <input class="form-control" name="identification" type="text" id="identification" value="{{ isset($beneficiary->identification) ? $beneficiary->identification : ''}}" required>
    {!! $errors->first('identification', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="form-label">{{ 'Address' }}</label>
    <input class="form-control" name="address" type="text" id="address" value="{{ isset($beneficiary->address) ? $beneficiary->address : ''}}" required>
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="form-label">{{ 'Phone' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($beneficiary->phone) ? $beneficiary->phone : ''}}" required>
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="form-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($beneficiary->email) ? $beneficiary->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>


<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
