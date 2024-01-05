<div class="form-group mb-3 {{ $errors->has('hame_phone') ? 'has-error' : ''}}">
    <label for="hame_phone" class="form-label">Teléfonos de Hame</label>
    <input class="form-control" name="hame_phone" type="text" id="hame_phone" value="{{ isset($data->hame_phone) ? $data->hame_phone : ''}}" >
    {!! $errors->first('hame_phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('hame_email') ? 'has-error' : ''}}">
    <label for="hame_email" class="form-label">Correos de Hame</label>
    <input class="form-control" name="hame_email" type="text" id="hame_email" value="{{ isset($data->hame_email) ? $data->hame_email : ''}}" >
    {!! $errors->first('hame_email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('hame_address') ? 'has-error' : ''}}">
    <label for="hame_address" class="form-label">Dirección de Hame</label>
    <input class="form-control" name="hame_address" type="text" id="hame_address" value="{{ isset($data->hame_address) ? $data->hame_address : ''}}" >
    {!! $errors->first('hame_address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('hame_schedule') ? 'has-error' : ''}}">
    <label for="hame_schedule" class="form-label">Horarios de Hame</label>
    <input class="form-control" name="hame_schedule" type="text" id="hame_schedule" value="{{ isset($data->hame_schedule) ? $data->hame_schedule : ''}}" >
    {!! $errors->first('hame_schedule', '<p class="help-block">:message</p>') !!}
</div>

<h4 class="card-title mt-5 mb-5">Comisiones</h4>

<div class="form-group mb-3 {{ $errors->has('ref_earn_level1') ? 'has-error' : ''}}">
    <label for="ref_earn_level1" class="form-label">Referidos Nivel 1</label>
    <div class="input-group mb-3  input-secondary">
        <span class="input-group-text">$</span>
        <input type="number" min="0" name="ref_earn_level1" id="ref_earn_level1" class="form-control" value="{{ isset($data->ref_earn_level1) ? $data->ref_earn_level1 : ''}}">
        <span class="input-group-text">%</span>
    </div>
    {!! $errors->first('ref_earn_level1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('ref_earn_level2') ? 'has-error' : ''}}">
    <label for="ref_earn_level2" class="form-label">Referidos Nivel 2</label>
    <div class="input-group mb-3  input-secondary">
        <span class="input-group-text">$</span>
        <input type="number" min="0" name="ref_earn_level2" id="ref_earn_level2" class="form-control" value="{{ isset($data->ref_earn_level2) ? $data->ref_earn_level2 : ''}}">
        <span class="input-group-text">%</span>
    </div>
    {!! $errors->first('ref_earn_level2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('ref_earn_level3') ? 'has-error' : ''}}">
    <label for="ref_earn_level3" class="form-label">Referidos Nivel 3</label>
    <div class="input-group mb-3  input-secondary">
        <span class="input-group-text">$</span>
        <input type="number" min="0" name="ref_earn_level3" id="ref_earn_level3" class="form-control" value="{{ isset($data->ref_earn_level3) ? $data->ref_earn_level3 : ''}}">
        <span class="input-group-text">%</span>
    </div>
    {!! $errors->first('ref_earn_level3', '<p class="help-block">:message</p>') !!}
</div>

<h4 class="card-title mt-5 mb-5">Definiciones de Tiempo en Horas</h4>

<div class="form-group mb-3 {{ $errors->has('time_mailman_to_deliver') ? 'has-error' : ''}}">
    <label for="time_mailman_to_deliver" class="form-label">Tiempo disponible para que el mensajero complete una entrega</label>
    <div class="input-group mb-3  input-secondary">
        <input type="number" min="0" name="time_mailman_to_deliver" id="time_mailman_to_deliver" class="form-control" value="{{ isset($data->time_mailman_to_deliver) ? $data->time_mailman_to_deliver : ''}}">
        <span class="input-group-text">/h</span>
    </div>
    {!! $errors->first('time_mailman_to_deliver', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('time_client_to_confirm') ? 'has-error' : ''}}">
    <label for="time_client_to_confirm" class="form-label">Tiempo disponible para que el cliente confirme la entrega</label>
    <div class="input-group mb-3  input-secondary">
        <input type="number" min="0" name="time_client_to_confirm" id="time_client_to_confirm" class="form-control" value="{{ isset($data->time_client_to_confirm) ? $data->time_client_to_confirm : ''}}">
        <span class="input-group-text">/h</span>
    </div>
    {!! $errors->first('time_client_to_confirm', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('time_remittances_priority_to_referrals') ? 'has-error' : ''}}">
    <label for="time_remittances_priority_to_referrals" class="form-label">Tiempo disponible para mostrar las remesas con prioridad a los referidos</label>
    <div class="input-group mb-3  input-secondary">
        <input type="number" min="0" name="time_remittances_priority_to_referrals" id="time_remittances_priority_to_referrals" class="form-control" value="{{ isset($data->time_remittances_priority_to_referrals) ? $data->time_remittances_priority_to_referrals : ''}}">
        <span class="input-group-text">/h</span>
    </div>
    {!! $errors->first('time_remittances_priority_to_referrals', '<p class="help-block">:message</p>') !!}
</div>

{{-- <div class="form-group mb-3 {{ $errors->has('key') ? 'has-error' : ''}}">
    <label for="key" class="form-label">{{ 'Key' }}</label>
    <input class="form-control" name="key" type="text" id="key" @if (isset($data)) disabled @endif value="{{ isset($data->key) ? $data->key : ''}}" required>
    {!! $errors->first('key', '<p class="help-block">:message</p>') !!}
</div> --}}
{{-- <div class="form-group mb-3 {{ $errors->has('key') ? 'has-error' : ''}}">
    <label for="key" class="form-label">Tipo</label>
    <div class="row align-items-center">
        <div class="w-full my-1">
            <select name="key" class="form-control wide single-select" id="key" >
                <option value="">Seleccione ...</option>
                <option value="email" {{ (isset($data->id) && $data->key == 'email') ? 'selected' : ''}}>Correo</option>
                <option value="phone" {{ (isset($data->id) && $data->key == 'phone') ? 'selected' : ''}}>Teléfono</option>
                <option value="time" {{ (isset($data->id) && $data->key == 'time') ? 'selected' : ''}}>Tiempo / horas</option>
            </select>
        </div>
    </div>
    {!! $errors->first('key', '<p class="help-block">:message</p>') !!}
</div> --}}
{{-- <div class="form-group mb-3 {{ $errors->has('value') ? 'has-error' : ''}}">
    <label for="value" class="form-label">{{ 'Value' }}</label>
    <input class="form-control" name="value" type="text" id="value" value="{{ isset($data->value) ? $data->value : ''}}" required>
    {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
</div> --}}


<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
