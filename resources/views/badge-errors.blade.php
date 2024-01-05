@if ($message = Session::get('success'))
    <div class="alert alert-success solid alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
        </button>
        <strong>Éxito!</strong> {{ $message }}
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-danger solid alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
        </button>
        <strong>Error!</strong> {{ $message }}
    </div>
@endif
@if ($message = Session::get('warning'))
    <div class="alert alert-warning solid alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
        </button>
        <strong>Alerta!</strong> {{ $message }}
    </div>
@endif
@if ($message = Session::get('info'))
    <div class="alert alert-info solid alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
        </button>
        <strong>Aviso!</strong> {{ $message }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger solid alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
        </button>
        <strong>Error!</strong> Please check the form below for errors
    </div>
@endif
