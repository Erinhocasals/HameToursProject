@extends('layouts.admin.global')

@prepend('styles')
<link href="{{ asset('admin-template/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
<link href="https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css" rel="stylesheet">
<style>
    #map { height: 200px; width: 100%; border-radius: 1rem; }
</style>
@endprepend

@prepend('scripts')
<script src="{{ asset('admin-template/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js"></script>
<script>
    // TO MAKE THE MAP APPEAR YOU MUST
	// ADD YOUR ACCESS TOKEN FROM
	// https://account.mapbox.com
	mapboxgl.accessToken = 'pk.eyJ1Ijoiamxtb3JhbGVzMDgwIiwiYSI6ImNrZGtxbWQ5azAydmIydHBlbXc0M3Jtb2gifQ.6_P518SOt9q-y9eJ49ygAw';
    const map = new mapboxgl.Map({
        container: 'map', // container ID
        style: 'mapbox://styles/mapbox/streets-v11', // style URL
        center: [{{ $entity->longitude ?: -82.366592 }}, {{ $entity->latitude ?: 23.113592 }}], // starting position [lng, lat]
        zoom: 5, // starting zoom
        projection: 'globe' // display the map as a 3D globe
    });

    let marker = null;
    let latitude = document.querySelector("#latitude");

    if (latitude.value != "") {
        // Create a default Marker and add it to the map.
        marker = new mapboxgl.Marker({color: '#4BD1E0'})
        .setLngLat([{{ $entity->longitude }}, {{ $entity->latitude }}])
        .addTo(map);

        map.on('style.load', () => {
            map.setFog({}); // Set the default atmosphere style
        });
    }
</script>
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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Productos</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $entity->title }}</a></li>
        </ol>
    </div>

    @include('badge-errors')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $entity->title }}</h4>
                    <div class="flex">
                        <a href="{{ url('/admin/entities') }}" title="Regresar"><button class="mr-1 shadow btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <a href="{{ url('/admin/entities/' . $entity->id . '/edit') }}" title="Editar"><button class="mr-1 shadow btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('admin/entities' . '/' . $entity->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="button" class="shadow btn btn-danger btn-sm sweet-success-cancel" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form>

                        @if (!$entity->showcase)
                            <a href="{{ url('/admin/showcases/create/Entity/' . $entity->id) }}" title="Crear Showcase"><button class="mr-1 shadow btn btn-info btn-sm ml-1"><i class="fa fa-plus" aria-hidden="true"></i> Crear Showcase</button></a>
                        @endif

                        {{-- @if (count($entity->prices) == 0)
                            <a href="{{ url('/admin/entity-prices/create/' . $entity->id) }}" title="Crear Precio"><button class="mr-1 shadow btn btn-info btn-sm ml-1"><i class="fa fa-plus" aria-hidden="true"></i> Crear Precio</button></a>
                        @endif --}}

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <input type="hidden" id="latitude" value="{{ $entity->latitude }}" />
                                <tr>
                                    <th>ID</th><td>{{ $entity->id }}</td>
                                </tr>
                                <tr><th> Título </th><td> {!! $entity->title !!} </td></tr>
                                <tr><th> Resumen </th><td> {!! $entity->summary !!} </td></tr>
                                <tr><th> Descripción </th><td> {!! $entity->content !!} </td></tr>
                                <tr><th> Características </th><td> {!! $entity->characteristics !!} </td></tr>
                                <tr><th> Texto Informativo Reserva </th><td> {!! $entity->reservation_message !!} </td></tr>
                                <tr><th> Imagen </th><td> @if ($entity->image) <img class="h-48 shadow rounded-sm object-cover" src="{{ asset('storage/' . $entity->image->url) }}" /> @endif </td></tr>
                                <tr><th> Habilitado </th><td> {{ $entity->enabled }} </td></tr>
                                <tr><th> Permitir Mensajería </th><td> {{ $entity->bank_interaction }} </td></tr>
                                <tr><th> Modena de Entrega para Mensajería </th><td> {{ $entity->currencyToString() }} </td></tr>
                                <tr><th> Cantidad a Entregar para Mensajería </th><td> {{ $entity->bank_delivery_amount }} </td></tr>
                                <tr><th> Mapa </th><td> <div id="map"></div> </td></tr>
                                <tr><th> Latitud </th><td> {{ $entity->latitude }} </td></tr>
                                <tr><th> Longitud </th><td> {{ $entity->longitude }} </td></tr>
                                <tr><th> Proveedor </th><td> {{ $entity->supplier }} </td></tr>
                                <tr><th> Costo </th><td> {{ $entity->cost }} </td></tr>
                                <tr><th> Fecha de Inicio </th><td> {{ $entity->date_start }} </td></tr>
                                <tr><th> Fecha de Fin </th><td> {{ $entity->date_end }} </td></tr>
                                <tr><th> Categoría </th><td> <a href="{{ $entity->category->backendLink() }}"> <span class="badge badge-sm light badge-primary">{{ $entity->category->title }}</span> </a> </td></tr>
                                <tr><th> Definiciones </th><td>
                                    @foreach ($entity->definitions as $definition)
                                        <a href="{{ $definition->backendLink() }}"> <span class="badge badge-sm light badge-primary">{{ $definition->title }}</span> </a>
                                    @endforeach
                                </td></tr>
                                <tr><th> Filtros </th><td>
                                    @foreach ($entity->filters as $filter)
                                        <a href="{{ $filter->backendLink() }}" <span class="badge badge-sm light badge-primary">{{ $filter->title }}</span> </a>
                                    @endforeach
                                </td></tr>
                                <tr><th> Editores </th><td>
                                    @foreach ($entity->editors as $editor)
                                        <a href="{{ route('admin.users.show', ['user' => $editor->user->id]) }}"> <span class="badge badge-sm light badge-primary">{{ $editor->user->name }}</span> </a>
                                    @endforeach
                                </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        @if ($entity->showcase)
            @include('admin.showcases.show-content', ['showcase' => $entity->showcase])
        @endif

        <div class="card-header">
            <h2 class="card-title">Precios</h2>
            <a href="{{ url('/admin/prices/create/Entity/' . $entity->id) }}" class="btn btn-primary btn-sm" title="Adicionar nuevo precio">
                <i class="fa fa-plus" aria-hidden="true"></i> Adicionar nuevo
            </a>
        </div>

        @foreach ($entity->prices as $price)
            <div class="col-md-6">
                @include('admin.prices.show-content', ['price' => $price])
            </div>
        @endforeach

        <div class="card-header">
            <h2 class="card-title">Experiencias</h2>
            <a href="{{ url('/admin/experiences/create') }}" class="btn btn-primary btn-sm" title="Adicionar nueva experiencia">
                <i class="fa fa-plus" aria-hidden="true"></i> Adicionar nueva
            </a>
        </div>

        @foreach ($entity->experiences as $experience)
            <div class="col-md-6">
                @include('admin.experiences.show-content', ['experience' => $experience])
            </div>
        @endforeach

        <div class="card-header">
            <h2 class="card-title">Textos Complementarios</h2>
            <a href="{{ url('/admin/texts/create/Entity/' . $entity->id) }}" class="btn btn-primary btn-sm" title="Adicionar nuevo texto">
                <i class="fa fa-plus" aria-hidden="true"></i> Adicionar nuevo
            </a>
        </div>

        @foreach ($entity->texts as $text)
            <div class="col-md-6">
                @include('admin.texts.show-content', ['text' => $text])
            </div>
        @endforeach

    </div>
@endsection
