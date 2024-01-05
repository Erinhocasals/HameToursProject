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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Blog</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $blog->title }}</a></li>
        </ol>
    </div>

    @include('badge-errors')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $blog->title }}</h4>
                    <div class="flex">
                        <a href="{{ url('/admin/blog') }}" title="Regresar"><button class="mr-1 shadow btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <a href="{{ url('/admin/blog/' . $blog->id . '/edit') }}" title="Editar"><button class="mr-1 shadow btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('admin/blog' . '/' . $blog->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="button" class="shadow btn btn-danger btn-sm sweet-success-cancel" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form>

                        @if (!$blog->intro)
                            <a href="{{ url('/admin/intros/create/Blog/' . $blog->id) }}" title="Crear Intro"><button class="mr-1 shadow btn btn-info btn-sm ml-1"><i class="fa fa-plus" aria-hidden="true"></i> Crear Intro</button></a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $blog->id }}</td>
                                </tr>
                                <tr><th> Título </th><td> {{ $blog->title }} </td></tr>
                                <tr><th> Resumen </th><td> {!! $blog->summary !!} </td></tr>
                                <tr><th> Descripción </th><td> {!! $blog->content !!} </td></tr>
                                <tr><th> Imagen </th><td> @if ($blog->image) <a href="{{ route('admin.images.show', ['image' => $blog->image]) }}"> <img class="h-48 shadow rounded-sm object-cover" src="{{ asset('storage/' . $blog->image->url) }}" /> </a> @endif </td></tr>
                                <tr><th> Habilitado </th><td> {{ $blog->enabled }} </td></tr>
                                <tr><th> Menú </th><td> @if ($blog->menu) <a href="{{ $blog->menu->menu->backendLink() }}" <span class="badge badge-sm light badge-primary">{{ $blog->menu->menu->title }}</span> </a> @endif </td></tr>
                                {{-- <tr><th> Author </th><td> {{ $blog->author }} </td></tr> --}}
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        @if (count($blog->comments()) > 0)
            @include('admin.comments.show', ['comments' => $blog->comments()])
        @endif

        @if ($blog->intro)
            @include('admin.intros.show-content', ['intro' => $blog->intro])
        @endif

    </div>
@endsection
