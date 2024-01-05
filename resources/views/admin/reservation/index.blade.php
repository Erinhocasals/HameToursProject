@extends('layouts.admin.global')

@prepend('styles')
<link href="{{ asset('admin-template/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin-template/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
<style>
    .wide {
        width: 25% !important
    }
</style>
@endprepend

@prepend('scripts')
<script src="{{ asset('admin-template/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin-template/js/plugins-init/datatables.init.js') }}"></script>
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

    var table = $('#reservations').DataTable({
		language: {
			paginate: {
			  next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			  previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
			}
		},
        order: [[ 0, "desc" ]]
	});

    $("#status_id").on('change', function() {
        var status = $("#status_id").val();
        document.location = "{{ route('admin.reservations.index') }}" + '?status=' + status;
    });

</script>
@endprepend

@section('content')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Reservaciones</a></li>
        </ol>
    </div>

    @include('badge-errors')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Reservaciones</h4>
                    {{-- <a href="{{ url('/admin/reservations/create') }}" class="btn btn-primary btn-sm" title="Adicionar nueva">
                        <i class="fa fa-plus" aria-hidden="true"></i> Adicionar nuevo
                    </a> --}}
                    <select name="status_id" class="me-sm-2 default-select form-control wide" id="status_id">
                        <option value="">Seleccione ...</option>
                        @foreach ($statuses as $st)
                            <option value="{{ $st->status }}" {{ (isset($status) && $status == $st->status) ? 'selected' : ''}}>{{ $st->title }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="card-body">
                    {{-- <form method="GET" action="{{ url('/admin/reservation') }}" accept-charset="UTF-8" class="float-right my-2 form-inline my-lg-0" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <br/><br/> --}}

                    <div class="table-responsive">
                        <table id="reservations" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Estado</th>
                                    <th>Usuario</th>
                                    <th>Productos</th>
                                    <th>Propiedades</th>
                                    <th>Creada</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($reservations as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><span class="badge badge-sm light badge-primary text-white" style="background: {{ $item->status->color }}">{{ $item->status->title }}</span></td>
                                    <td><a href="{{ route('admin.users.show', ['user' => $item->user]) }}"><span class="badge badge-sm light badge-primary">{{ $item->user->name }}</span></a></td>
                                    <td>
                                        @foreach ($item->elements as $element)
                                            <a href="@if ($element->elementable) {{ $element->elementable->backendLink() }} @endif"><span class="badge light badge-warning">@if ($element->elementable) {{ $element->elementable->title }} @else - @endif</span></a>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if (count($item->containsReferral())) <span class="badge light badge-warning">Margen Comercial</span> @endif
                                        @if (count($item->containsRemittance())) <span class="badge light badge-warning">Mensajería</span> @endif
                                    </td>
                                    <td>{{ date('j M, Y', strtotime($item->created_at)) }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/admin/reservations/' . $item->id) }}" title="Detalles"><button class="shadow btn btn-info btn-xs sharp me-1"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        {{-- <a href="{{ url('/admin/reservations/' . $item->id . '/edit') }}" title="Editar"><button class="shadow btn btn-primary btn-xs sharp me-1"><i class="fa fa-pencil" aria-hidden="true"></i></button></a> --}}

                                        <form method="POST" action="{{ url('/admin/reservations/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="button" class="shadow btn btn-danger btn-xs sharp me-1 sweet-success-cancel" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $reservations->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
