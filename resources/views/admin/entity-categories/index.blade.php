@extends('layouts.admin.global')

@prepend('styles')
<link href="{{ asset('admin-template/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin-template/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
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
</script>
@endprepend

@section('content')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Entidades</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Categorías</a></li>
        </ol>
    </div>

    @include('badge-errors')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Categorías</h4>
                    <a href="{{ url('/admin/entity-categories/create') }}" class="btn btn-primary btn-sm" title="Adicionar nueva EntityCategory">
                        <i class="fa fa-plus" aria-hidden="true"></i> Adicionar nueva
                    </a>
                </div>
                <div class="card-body">
                    {{-- <form method="GET" action="{{ url('/admin/entity-categories') }}" accept-charset="UTF-8" class="float-right my-2 form-inline my-lg-0" role="search">
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
                        <table id="example3" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Habilitado</th>
                                    <th>Definiciones</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($entitycategories as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->enabled }}</td>
                                    <td>
                                        @foreach ($item->categories as $category)
                                            <a href="{{ $category->backendLink() }}" <span class="badge badge-sm light badge-primary">{{ $category->title }}</span> </a>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('/admin/entity-categories/' . $item->id) }}" title="Detalles"><button class="shadow btn btn-info btn-xs sharp me-1"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="{{ url('/admin/entity-categories/' . $item->id . '/edit') }}" title="Editar"><button class="shadow btn btn-primary btn-xs sharp me-1"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>

                                        <form method="POST" action="{{ url('/admin/entity-categories' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="button" class="shadow btn btn-danger btn-xs sharp me-1 sweet-success-cancel" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $entitycategories->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
