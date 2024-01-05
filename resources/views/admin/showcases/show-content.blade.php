<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>Showcase #{{ $showcase->id }}</h4>
            <div class="flex">
                <a href="{{ $showcase->showcaseable->backendLink() }}" title="Regresar"><button class="mr-1 shadow btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                <a href="{{ url('/admin/showcases/' . $showcase->id . '/edit') }}" title="Editar"><button class="mr-1 shadow btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                <form method="POST" action="{{ url('admin/showcases' . '/' . $showcase->id) }}" accept-charset="UTF-8" style="display:inline">
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
                            <th>ID</th><td>{{ $showcase->id }}</td>
                        </tr>
                        <tr><th> Título </th><td> {!! $showcase->title !!} </td></tr>
                        <tr><th> Subtítulo </th><td> {{ $showcase->subtitle }} </td></tr>
                        {{-- <tr><th> Descripción </th><td> {!! $showcase->content !!} </td></tr> --}}
                        <tr><th> Icono </th><td> <img class="outline-svg max-h-20 bg-blue-300" src="{{ asset('storage/' . $showcase->svg) }}"> </td></tr>
                        <tr>
                            <th>
                                Imágenes
                            </th>
                            <td>
                                <a class="float-right" href="{{ url('/admin/images/create/Showcase/' . $showcase->id) }}" title="Adicionar Imagen"><button class="mr-1 shadow btn btn-info btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</button></a>

                                <div id="DZ_W_Todo1" class="widget-media dz-scroll height370 mt-20">
                                    <ul class="timeline">
                                        @foreach ($showcase->images as $image)
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="media me-2" style="flex: 1">
                                                        <img alt="image" src="{{ asset('storage/' . $image->url) }}">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-1"><i class="fa fa-map-marker"></i> {{ $image->tag }}</h5>
                                                        <small class="d-block">{{ $image->created_at }}</small>
                                                    </div>
                                                    <div class="flex">
                                                        <a href="{{ url('/admin/images/' . $image->id) }}" title="Detalles"><button class="shadow btn btn-info btn-xs sharp me-1"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                        <a href="{{ url('/admin/images/' . $image->id . '/edit') }}" title="Editar"><button class="shadow btn btn-primary btn-xs sharp me-1"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                        <form method="POST" action="{{ url('/admin/images' . '/' . $image->id) }}" accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button type="button" class="shadow btn btn-danger btn-xs sharp me-1 sweet-success-cancel" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr><th> Habilitado </th><td> {{ $showcase->enabled }} </td></tr>
                        <tr><th> Pertenece </th><td><a href="{{ $showcase->showcaseable->backendLink() }}"><span class="badge badge-sm light badge-primary">{{ $showcase->showcaseable->title }}</span></a> </td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
