<div class="form-group mb-3 {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="form-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($contact->name) ? $contact->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="form-label">{{ 'Phone' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($contact->phone) ? $contact->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="form-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($contact->email) ? $contact->email : ''}}" required>
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('message') ? 'has-error' : ''}}">
    <label for="message" class="form-label">{{ 'Message' }}</label>
    <div class="inline-flex">
    <div class="form-check mr-3">
        <input class="form-check-input" name="message" type="radio" value="1" {{ (isset($contact) && 1 == $contact->message) ? 'checked' : '' }}>
        <label class="form-check-label"> Sí</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" name="message" type="radio" value="0" @if (isset($contact)) {{ (0 == $contact->message) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
        <label class="form-check-label"> No</label>
    </div>
</div>

    {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
</div>


<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
