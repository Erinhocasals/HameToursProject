@extends('layouts.admin.global')

@prepend('styles')
<link href="{{ asset('admin-template/vendor/summernote/summernote-lite.min.css') }}" rel="stylesheet">
@endprepend

@prepend('scripts')
<script src="{{ asset('admin-template/vendor/summernote/summernote-lite.min.js') }}"></script>
@endprepend

@section('content')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Transacciones</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Nueva Transacción</a></li>
        </ol>
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Nueva Transacción</h4>
                    <a href="{{ url('/admin/transaction') }}" title="Regresr"><button class="btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ url('/admin/transaction') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('admin.transaction.form', ['formMode' => 'create'])

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
