@extends('layouts.admin.global')

@prepend('styles')
<link href="{{ asset('admin-template/vendor/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin-template/vendor/summernote/summernote-lite.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('admin-template/vendor/pickadate/themes/default.css') }}">
<link rel="stylesheet" href="{{ asset('admin-template/vendor/pickadate/themes/default.date.css') }}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css" rel="stylesheet">
<link rel='stylesheet'
    href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css'
    type='text/css' />
<style>
    #map { height: 400px; width: 100%; border-radius: 1rem; }
    .coordinates {
        background: rgba(0, 0, 0, 0.5);
        color: #fff;
        position: absolute;
        bottom: 40px;
        padding: 5px 10px;
        margin: 0;
        font-size: 11px;
        line-height: 18px;
        border-radius: 3px;
        display: none;
    }
</style>
@endprepend

@prepend('scripts')
<script src="{{ asset('admin-template/vendor/summernote/summernote-lite.min.js') }}"></script>
<script src="{{ asset('admin-template/vendor/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin-template/js/plugins-init/select2-init.js') }}"></script>
<script src="{{ asset('admin-template/vendor/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin-template/vendor/pickadate/picker.js') }}"></script>
<script src="{{ asset('admin-template/vendor/pickadate/picker.time.js') }}"></script>
<script src="{{ asset('admin-template/vendor/pickadate/picker.date.js') }}"></script>
<script src="{{ asset('admin-template/js/plugins-init/pickadate-init.js') }}"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js"></script>
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js'></script>
<script>
    // TO MAKE THE MAP APPEAR YOU MUST
	// ADD YOUR ACCESS TOKEN FROM
	// https://account.mapbox.com
	mapboxgl.accessToken = 'pk.eyJ1Ijoiamxtb3JhbGVzMDgwIiwiYSI6ImNrZGtxbWQ5azAydmIydHBlbXc0M3Jtb2gifQ.6_P518SOt9q-y9eJ49ygAw';
    const map = new mapboxgl.Map({
        container: 'map', // container ID
        style: 'mapbox://styles/mapbox/streets-v11', // style URL
        center: [-82.366592, 23.113592 ], // starting position [lng, lat]
        zoom: 5, // starting zoom
        projection: 'globe' // display the map as a 3D globe
    });

    const geocoder = new MapboxGeocoder({
        // Initialize the geocoder
        accessToken: mapboxgl.accessToken, // Set the access token
        mapboxgl: mapboxgl, // Set the mapbox-gl instance
        marker: false // Do not use the default marker style
    });
    
    // Add the geocoder to the map
    map.addControl(geocoder);
    
    map.on('load', () => {
        map.addSource('single-point', {
            type: 'geojson',
            data: {
            type: 'FeatureCollection',
            features: []
            }
        });
        
        map.addLayer({
            id: 'point',
            source: 'single-point',
            type: 'circle',
            paint: {
            'circle-radius': 10,
            'circle-color': '#fd8b20'
            }
        });
        
        // Listen for the `result` event from the Geocoder
        // `result` event is triggered when a user makes a selection
        // Add a marker at the result's coordinates
        geocoder.on('result', (event) => {
            map.getSource('single-point').setData(event.result.geometry);
        });
    });

    let marker = null;

    marker = new mapboxgl.Marker({color: '#4BD1E0', draggable: true})
    map.on('click', addMarker);

    function onDragEnd() {
        const lngLat = marker.getLngLat();
        coordinates.style.display = 'block';
        coordinates.innerHTML = `Longitude: ${lngLat.lng}<br />Latitude: ${lngLat.lat}`;
        document.querySelector("#latitude").value = lngLat.lat;
        document.querySelector("#longitude").value = lngLat.lng;
    }

    function addMarker (event) {
        var coordinates = event.lngLat;
        console.log('Lng:', coordinates.lng, 'Lat:', coordinates.lat);
        marker.setLngLat(coordinates).addTo(map);
        document.querySelector("#coordinates").style.display = 'block';
        document.querySelector("#coordinates").innerHTML = `Longitude: ${coordinates.lng}<br />Latitude: ${coordinates.lat}`;
        document.querySelector("#latitude").value = coordinates.lat;
        document.querySelector("#longitude").value = coordinates.lng;
        marker.on('dragend', onDragEnd);
    }
</script>
@endprepend

@section('content')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Entidades</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Productos</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Nuevo Producto</a></li>
        </ol>
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Nuevo Producto</h4>
                    <a href="{{ url('/admin/entities') }}" title="Back"><button class="btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ url('/admin/entities') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('admin.entities.form', ['formMode' => 'create'])

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
