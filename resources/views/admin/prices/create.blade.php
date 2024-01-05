@extends('layouts.admin.global')

@prepend('styles')
<link href="{{ asset('admin-template/vendor/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin-template/vendor/summernote/summernote-lite.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('admin-template/vendor/pickadate/themes/default.css') }}">
<link rel="stylesheet" href="{{ asset('admin-template/vendor/pickadate/themes/default.date.css') }}">
@endprepend

@prepend('scripts')
<script src="{{ asset('admin-template/vendor/summernote/summernote-lite.min.js') }}"></script>
<script src="{{ asset('admin-template/vendor/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin-template/js/plugins-init/select2-init.js') }}"></script>
<script src="{{ asset('admin-template/vendor/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin-template/vendor/pickadate/picker.js') }}"></script>
<script src="{{ asset('admin-template/vendor/pickadate/picker.time.js') }}"></script>
<script src="{{ asset('admin-template/vendor/pickadate/picker.date.js') }}"></script>
<script src="{{ asset('admin-template/js/plugins-init/pickadate-init.js') }}"></script>
@endprepend

@section('content')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Precios</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Nuevo Precio</a></li>
        </ol>
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Nuevo Precio</h4>
                    <a href="{{ url('/admin/prices') }}" title="Back"><button class="btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ url('/admin/prices') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('admin.prices.form', ['formMode' => 'create'])

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
