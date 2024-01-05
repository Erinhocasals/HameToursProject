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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Paquetes</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $package->title }}</a></li>
        </ol>
    </div>

    @include('badge-errors')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $package->title }}</h4>
                    <div class="flex">
                        <a href="{{ url('/admin/package') }}" title="Regresar"><button class="mr-1 shadow btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <a href="{{ url('/admin/package/' . $package->id . '/edit') }}" title="Editar"><button class="mr-1 shadow btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('admin/package' . '/' . $package->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="button" class="shadow btn btn-danger btn-sm sweet-success-cancel" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form>

                        @if (!$package->showcase)
                            <a href="{{ url('/admin/showcases/create/Package/' . $package->id) }}" title="Crear Showcase"><button class="mr-1 ml-1 shadow btn btn-info btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Crear Showcase</button></a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $package->id }}</td>
                                </tr>
                                <tr><th> Título </th><td> {{ $package->title }} </td></tr>
                                <tr><th> Subtítulo </th><td> {{ $package->subtitle }} </td></tr>
                                <tr><th> Resumen </th><td> {!! $package->summary !!} </td></tr>
                                <tr><th> Descripción </th><td> {!! $package->content !!} </td></tr>
                                <tr><th> Características </th><td> {!! $package->characteristics !!} </td></tr>
                                <tr><th> Incluye </th><td> {!! $package->includes !!} </td></tr>
                                <tr><th> Imagen </th><td> @if ($package->image) <img class="h-48 shadow rounded-sm object-cover" src="{{ asset('storage/' . $package->image->url) }}" /> @endif </td></tr>
                                <tr><th> Habilitado </th><td> {{ $package->enabled }} </td></tr>
                                <tr><th> Destacado </th><td> {{ $package->starred }} </td></tr>
                                <tr><th> Definiciones </th><td>
                                    @foreach ($package->definitions as $definition)
                                        <a href="{{ $definition->backendLink() }}" <span class="badge badge-sm light badge-primary">{{ $definition->title }}</span> </a>
                                    @endforeach
                                </td></tr>
                                <tr><th> Editores </th><td>
                                    @foreach ($package->editors as $editor)
                                        <a href="{{ route('admin.users.show', ['user' => $editor->user->id]) }}"> <span class="badge badge-sm light badge-primary">{{ $editor->user->name }}</span> </a>
                                    @endforeach
                                </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        @if ($package->showcase)
            @include('admin.showcases.show-content', ['showcase' => $package->showcase])
        @endif

        @include('admin.package-time.index-table', ['times' => $package->times])

        <div class="card-header">
            <h2 class="card-title">Precios</h2>
            <a href="{{ url('/admin/prices/create/Package/' . $package->id) }}" class="btn btn-primary btn-sm" title="Adicionar nuevo precio">
                <i class="fa fa-plus" aria-hidden="true"></i> Adicionar nuevo
            </a>
        </div>

        @foreach ($package->prices as $price)
            <div class="col-md-6">
                @include('admin.prices.show-content', ['package' => $price])
            </div>
        @endforeach

        <div class="card-header">
            <h2 class="card-title">Textos Complementarios</h2>
            <a href="{{ url('/admin/texts/create/Package/' . $package->id) }}" class="btn btn-primary btn-sm" title="Adicionar nuevo texto">
                <i class="fa fa-plus" aria-hidden="true"></i> Adicionar nuevo
            </a>
        </div>

        @foreach ($package->texts as $text)
            <div class="col-md-6">
                @include('admin.texts.show-content', ['text' => $text])
            </div>
        @endforeach

    </div>
@endsection
