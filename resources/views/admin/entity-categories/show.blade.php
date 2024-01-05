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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Entidades</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Categorías</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $entitycategory->title }}</a></li>
        </ol>
    </div>

    @include('badge-errors')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $entitycategory->title }}</h4>
                    <div class="flex">
                        <a href="{{ url('/admin/entity-categories') }}" title="Regresar"><button class="mr-1 shadow btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <a href="{{ url('/admin/entity-categories/' . $entitycategory->id . '/edit') }}" title="Editar"><button class="mr-1 shadow btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('admin/entitycategories' . '/' . $entitycategory->id) }}" accept-charset="UTF-8" style="display:inline">
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
                                    <th>ID</th><td>{{ $entitycategory->id }}</td>
                                </tr>
                                <tr><th> Nombre </th><td> {{ $entitycategory->title }} </td></tr>
                                <tr><th> Subtítulo </th><td> {{ $entitycategory->subtitle }} </td></tr>
                                <tr><th> SVG </th><td> {{ $entitycategory->svg }} </td></tr>
                                <tr><th> Descripción </th><td> {!! $entitycategory->content !!} </td></tr>
                                <tr><th> Habilitado </th><td> {{ $entitycategory->enabled }} </td></tr>
                                <tr><th> Definiciones </th><td>
                                    @foreach ($entitycategory->categories as $category)
                                        <a href="{{ $category->backendLink() }}" <span class="badge badge-sm light badge-primary">{{ $category->title }}</span> </a>
                                    @endforeach
                                </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
