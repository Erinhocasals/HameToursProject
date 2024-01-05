@extends('layouts.admin.global')

@prepend('styles')
<link href="{{ asset('admin-template/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
@endprepend

@prepend('scripts')
<script src="{{ asset('admin-template/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script>
    (document.querySelectorAll(".sweet-success-cancel").forEach(item => {
        item.addEventListener('click', event => {
            swal.fire({
                title: "¿Está seguro que desea eliminar el elemento?",
                text: "No podrá recuperar este elemento una vez lo haya borrado !!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#f72b50",
                confirmButtonText: "Sí, elimínalo !!",
                cancelButtonText: "Cancelar !!",
                closeOnConfirm: !1,
                closeOnCancel: !1,
            }).then((result) => {
                if (result.value) {
                    item.closest('form').submit();
                }
            });
        })
    }) )
</script>
@endprepend

@section('content')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Usuarios</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Roles</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $role->name }}</a></li>
        </ol>
    </div>

    @include('badge-errors')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $role->name }}</h4>
                    <div class="flex">
                        <a href="{{ url('/admin/roles') }}" title="Regresar"><button class="mr-1 shadow btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <a href="{{ url('/admin/roles/' . $role->id . '/edit') }}" title="Editar"><button class="mr-1 shadow btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $role->id }}</td>
                                </tr>
                                <tr><th> Nombre </th><td> {{ $role->name }} </td></tr>
                                <tr><th> Título </th><td> {{ $role->title }} </td></tr>
                                <tr><th> Descripción </th><td> {!! $role->content !!} </td></tr>
                                <tr><th> Habilitado </th><td> {{ $role->enabled }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
