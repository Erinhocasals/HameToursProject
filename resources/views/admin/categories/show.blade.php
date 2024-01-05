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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Categorías</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $category->title }}</a></li>
        </ol>
    </div>

    @include('badge-errors')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $category->title }}</h4>
                    <div class="flex">
                        @hasanyrole('super-admin|admin|editor')
                            <a href="{{ route('admin.categories.index', ['type' => $category->type]) }}" title="Regresar"><button class="mr-1 shadow btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        @endhasallroles

                        <a href="{{ url('/admin/categories/' . $category->id . '/edit') }}" title="Editar"><button class="mr-1 shadow btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        @hasanyrole('super-admin|admin|editor')
                            <form method="POST" action="{{ url('admin/categories' . '/' . $category->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="button" class="shadow btn btn-danger btn-sm mr-1 sweet-success-cancel" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                            </form>
                        @endhasanyrole

                        @if (!$category->showcase)
                            <a href="{{ url('/admin/showcases/create/Category/' . $category->id) }}" title="Crear Showcase"><button class="mr-1 shadow btn btn-info btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Crear Showcase</button></a>
                        @endif

                        @if (!$category->intro)
                            <a href="{{ url('/admin/intros/create/Category/' . $category->id) }}" title="Crear Intro"><button class="mr-1 shadow btn btn-info btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Crear Intro</button></a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $category->id }}</td>
                                </tr>
                                <tr><th> Nombre </th><td> {{ $category->title }} </td></tr>
                                <tr><th> Subtítulo </th><td> {{ $category->subtitle }} </td></tr>
                                <tr><th> Descripción </th><td> {!! $category->content !!} </td></tr>
                                <tr><th> Sección Entidades </th><td> {!! $category->entities_intro !!} </td></tr>
                                <tr><th> Texto Informativo Reservas </th><td> {!! $category->reservation_message !!} </td></tr>
                                <tr><th> Imagen </th><td> @if ($category->image) <a href="{{ route('admin.images.show', ['image' => $category->image]) }}"> <img class="h-48 shadow rounded-sm object-cover" src="{{ asset('storage/' . $category->image->url) }}" /> </a> @endif </td></tr>
                                <tr><th> Habilitado </th><td> {{ $category->enabled }} </td></tr>
                                @hasanyrole('super-admin|admin|editor')
                                <tr><th> Mostrar en Home </th><td> {{ $category->show_in_home }} </td></tr>
                                <tr><th> Listar Agencias </th><td> {{ $category->group_agencies }} </td></tr>
                                @endhasanyrole
                                <tr><th> Pertenece </th><td> @if ($category->category_id) <a href="{{ $category->parent->backendLink() }}"> <span class="badge badge-sm light badge-primary">{{ $category->parent->title }}</span> </a> @else - @endif </td></tr>
                                <tr><th> Menú </th><td> @if ($category->menu) <a href="{{ $category->menu->menu->backendLink() }}"> <span class="badge badge-sm light badge-primary">{{ $category->menu->menu->title }}</span> </a> @endif </td></tr>
                                <tr><th> Editores </th><td>
                                    @foreach ($category->editors as $editor)
                                        <a href="{{ route('admin.users.show', ['user' => $editor->user->id]) }}"> <span class="badge badge-sm light badge-primary">{{ $editor->user->name }}</span> </a>
                                    @endforeach
                                </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if ($category->showcase)
            @include('admin.showcases.show-content', ['showcase' => $category->showcase])
        @endif

        @if ($category->intro)
            @include('admin.intros.show-content', ['intro' => $category->intro])
        @endif

        <div class="card-header">
            <h2 class="card-title">Textos Complementarios</h2>
            <a href="{{ url('/admin/texts/create/Category/' . $category->id) }}" class="btn btn-primary btn-sm" title="Adicionar nuevo texto">
                <i class="fa fa-plus" aria-hidden="true"></i> Adicionar nuevo
            </a>
        </div>

        @foreach ($category->texts as $text)
            <div class="col-md-6">
                @include('admin.texts.show-content', ['text' => $text])
            </div>
        @endforeach

    </div>
@endsection
