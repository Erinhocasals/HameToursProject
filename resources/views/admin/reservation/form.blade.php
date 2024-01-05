<div class="form-group mb-3 {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="form-label">{{ 'Content' }}</label>
    <textarea class="form-control summernote" rows="5" name="content" type="textarea" id="content" >{{ isset($reservation->content) ? $reservation->content : ''}}</textarea>

    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="form-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="number" id="status" value="{{ isset($reservation->status) ? $reservation->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="form-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($reservation->price) ? $reservation->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-3 {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="form-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($reservation->user_id) ? $reservation->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="row">
    <div class="text-right form-group mt-9">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
