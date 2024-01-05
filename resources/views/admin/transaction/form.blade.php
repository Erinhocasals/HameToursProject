<div class="form-group mb-3 {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="form-label">Monto</label>
    <input class="form-control" name="amount" type="number" id="amount" value="{{ isset($transaction->amount) ? $transaction->amount : ''}}" required>
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('currency') ? 'has-error' : ''}}">
    <label for="currency" class="form-label">Moneda</label>
    <div class="row align-items-center">
        <div class="w-full my-1">
            <select name="currency" class="me-sm-2 default-select form-control wide" id="currency" >
                <option value="">Seleccione ...</option>
                <option value="mlc" {{ (isset($transaction) && $transaction->currency == 'mlc') ? 'selected' : ''}}>MLC</option>
                <option value="cup" {{ (isset($transaction) && $transaction->currency == 'cup') ? 'selected' : ''}}>CUP</option>
                <option value="usd" {{ (isset($transaction) && $transaction->currency == 'usd') ? 'selected' : ''}}>USD</option>
                <option value="eur" {{ (isset($transaction) && $transaction->currency == 'eur') ? 'selected' : ''}}>EUR</option>
            </select>
        </div>
    </div>
    {!! $errors->first('currency', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="form-label">Tipo de Transacción</label>
    <div class="row align-items-center">
        <div class="w-full my-1">
            <select name="type" class="me-sm-2 default-select form-control wide" id="type" >
                <option value="">Seleccione ...</option>
                <option value="in" {{ (isset($transaction) && $transaction->type == 'in') ? 'selected' : ''}}>Depósito</option>
                <option value="out" {{ (isset($transaction) && $transaction->type == 'out') ? 'selected' : ''}}>Extracción</option>
            </select>
        </div>
    </div>
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="form-label">Usuario</label>
    <div class="row align-items-center">
        <div class="w-full my-1">
            <select name="user_id" class="me-sm-2 default-select form-control wide" id="user_id" >
                <option value="">Seleccione ...</option>
                @foreach ($users as $item)
                    <option value="{{ $item->id }}" {{ (isset($transaction) && $transaction->user_id == $item->id) ? 'selected' : ''}}>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>



<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
