@if ($errors->any())
    <div {{ $attributes ?? '' }}>
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger solid alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                </button>
                <strong>{{ __('Whoops! Something went wrong.') }}</strong> {{ $error }}
            </div>
        @endforeach
    </div>
@endif