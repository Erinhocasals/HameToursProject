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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Informaciones</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $info->title }}</a></li>
        </ol>
    </div>

    @include('badge-errors')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $info->title }}</h4>
                    <div class="flex">
                        <a href="{{ url('/admin/infos') }}" title="Regresar"><button class="mr-1 shadow btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <a href="{{ url('/admin/infos/' . $info->id . '/edit') }}" title="Editar"><button class="mr-1 shadow btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('admin/infos' . '/' . $info->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="button" class="shadow btn btn-danger btn-sm sweet-success-cancel" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form>

                        @if (!$info->intro)
                            <a href="{{ url('/admin/intros/create/Info/' . $info->id) }}" title="Crear Intro"><button class="mr-1 shadow btn btn-info btn-sm ml-1"><i class="fa fa-plus" aria-hidden="true"></i> Crear Intro</button></a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $info->id }}</td>
                                </tr>
                                <tr><th> Título </th><td> {{  $info->title  }} </td></tr>
                                <tr><th> Descripción </th><td> {!! $info->content !!} </td></tr>
                                <tr><th> Imagen </th><td> @if ($info->image) <a href="{{ route('admin.images.show', ['image' => $info->image]) }}"> <img class="h-48 shadow rounded-sm object-cover" src="{{ asset('storage/' . $info->image->url) }}" /> </a> @endif </td></tr>
                                <tr><th> Habilitado </th><td> {{ $info->enabled }} </td></tr>
                                <tr><th> Mostrar en Home </th><td> {{ $info->show_in_home }} </td></tr>
                                <tr><th> Pie de Página </th><td> {{ $info->footer }} </td></tr>
                                <tr><th> Menú </th><td> @if ($info->menu) <a href="{{ $info->menu->menu->backendLink() }}" <span class="badge badge-sm light badge-primary">{{ $info->menu->menu->title }}</span> </a> @endif </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        @if ($info->intro)
            @include('admin.intros.show-content', ['intro' => $info->intro])
        @endif

        <div class="card-header">
            <h2 class="card-title">Textos Complementarios</h2>
            <a href="{{ url('/admin/texts/create/Info/' . $info->id) }}" class="btn btn-primary btn-sm" title="Adicionar nuevo texto">
                <i class="fa fa-plus" aria-hidden="true"></i> Adicionar nuevo
            </a>
        </div>

        @foreach ($info->texts as $text)
            <div class="col-md-6">
                @include('admin.texts.show-content', ['text' => $text])
            </div>
        @endforeach

    </div>
@endsection
