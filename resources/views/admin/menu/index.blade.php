@extends('layouts.admin.global')

@prepend('styles')
<link href="{{ asset('admin-template/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin-template/vendor/datatables/css/rowReorder.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin-template/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
@endprepend

@prepend('scripts')
<script src="{{ asset('admin-template/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin-template/vendor/datatables/js/dataTables.rowReorder.min.js') }}"></script>
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

    var table = $('#orderable').DataTable({
		language: {
			paginate: {
			  next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			  previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
			}
		},
        order: [[ 0, "asc" ]],
        rowReorder: {
            selector: '.reorder-item'
        },
	});
    table.on('row-reorder', function (e, details, changes) {
        let data = [];
        var rows = document.querySelectorAll('.row-tr').forEach(function(el) {
            data.push(el.getAttribute("data-id"));
        })

        $.blockUI({
            message: '<h5>Actualizando elementos ...</h5>'
        });

        axios.post("{{ route('admin.menu.sort') }}", {},
        {
            params: {
                data: JSON.stringify(data)
            }
        })
        .then(function (response) {
            console.log(response);
            if (response == true) {
                toastr.success('Se han actualizado los elementos exitosamente');
            }
            else {
                toastr.success('Ocurrió un error actualizando los elementos. Intente nuevamente');
            }

            $.unblockUI();
        })
    });
</script>
@endprepend

@section('content')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Menú</a></li>
        </ol>
    </div>

    @include('badge-errors')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Menú</h4>
                    <a href="{{ route('admin.menu.create') }}" class="btn btn-primary btn-sm" title="Adicionar nuevo Menú">
                        <i class="fa fa-plus" aria-hidden="true"></i> Adicionar nuevo
                    </a>
                </div>
                <div class="card-body">
                    {{-- <form method="GET" action="{{ url('/admin/menu') }}" accept-charset="UTF-8" class="float-right my-2 form-inline my-lg-0" role="search">
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
                        <table id="orderable" class="display">
                            <thead>
                                <tr>
                                    <th class="hidden">Order</th>
                                    <th>Id</th>
                                    <th>Título</th>
                                    <th>Habilitado</th>
                                    <th>Visibilidad</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($menu as $item)
                                <tr data-id="{{ $item->id }}" class="row-tr">
                                    <div >
                                    <td class="hidden">{{ $item->order }}</td>
                                    <td class="reorder-item">{{ $item->id }}</td>
                                    <td>{!! $item->title !!}</td>
                                    <td>{{ $item->enabled }}</td>
                                    <td>@if ($item->show_in_nav) <span class="badge light badge-light">Menú Navegación</span> @endif @if ($item->show_in_footer) <span class="badge light badge-light">Footer</span> @endif</td>
                                    <td class="text-center">
                                        <a href="{{ url('/admin/menus/' . $item->id) }}" title="Detalles"><button class="shadow btn btn-info btn-xs sharp me-1"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="{{ url('/admin/menus/' . $item->id . '/edit') }}" title="Editar"><button class="shadow btn btn-primary btn-xs sharp me-1"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>

                                        <form method="POST" action="{{ url('/admin/menus' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="button" class="shadow btn btn-danger btn-xs sharp me-1 sweet-success-cancel" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $menu->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
