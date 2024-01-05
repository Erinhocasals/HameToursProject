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
            <li class="breadcrumb-item"><a href="javascript:void(0)">KYC</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $kyc->user->name }}</a></li>
        </ol>
    </div>

    @include('badge-errors')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $kyc->user->name }}</h4>
                    <div class="flex">
                        <a href="{{ url('/admin/kyc') }}" title="Regresar"><button class="mr-1 shadow btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <a href="{{ url('/admin/kyc/' . $kyc->id . '/edit') }}" title="Cambiar Estado"><button class="mr-1 shadow btn btn-primary btn-sm"><i class="fa fa-check" aria-hidden="true"></i> Cambiar Estado</button></a>

                        <form method="POST" action="{{ url('admin/kyc' . '/' . $kyc->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="button" class="shadow btn btn-danger btn-sm sweet-success-cancel" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $kyc->id }}</td>
                                </tr>
                                <tr><th> Usuario </th><td> <a href="{{ route('admin.users.show', ['user' => $kyc->user->id]) }}"> <span class="badge light badge-primary">{{ $kyc->user->name }}</span> </a> </td></tr>
                                <tr><th> No. Identidad </th><td> {{ $kyc->identity }} </td></tr>
                                <tr><th> Dirección </th><td> {{ $kyc->address }} </td></tr>
                                <tr><th> Localidades </th>
                                    <td>
                                        @foreach ($kyc->locations as $location)
                                            <span class="badge light badge-secondary">{{ $location->municipio }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr><th> Estado </th><td>
                                    @if ($kyc->approved)
                                        <span class="badge light badge-success">Aprobado</span>
                                    @else
                                        <span class="badge light badge-danger">Sin aprobar</span>
                                    @endif
                                </td></tr>
                                <tr><th> Documento </th><td> @if ($kyc->image) <a href="{{ asset('storage/' . $kyc->image->url) }}"> <img class="h-48 shadow rounded-sm object-cover" src="{{ asset('storage/' . $kyc->image->url) }}" /> </a> @endif </td></tr>
                                <tr><th> Fecha de Creación </th><td> {{ $kyc->created_at }} </td></tr>
                                <tr><th> Fecha de Modificación </th><td> {{ $kyc->updated_at }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        {{-- @include('admin.users.show', ['user' => $kyc->user]) --}}
    </div>
@endsection
