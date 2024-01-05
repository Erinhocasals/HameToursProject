<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Itinerario</h4>
            <a href="{{ isset($package) ? url('/admin/time/create/' . $package->id) : url('/admin/time/create') }}" class="btn btn-primary btn-sm" title="Adicionar nueva time">
                <i class="fa fa-plus" aria-hidden="true"></i> Adicionar nuevo
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example3" class="display">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tiempo</th>
                            <th>Definición</th>
                            <th>Estilo</th>
                            <th>Elementos</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($times as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->time }}</td>
                            <td>{{ $item->definition }}</td>
                            <td>{{ $item->style()->description }}</td>
                            <td>
                                @foreach ($item->contents as $content)
                                    <a href="{{ $content->contentable->backendLink() }}" <span class="badge badge-sm light badge-primary">{{ $content->contentable->title }}</span> </a>
                                @endforeach
                            </td>
                            <td class="text-center">
                                <a href="{{ url('/admin/time/' . $item->id) }}" title="Detalles"><button class="shadow btn btn-info btn-xs sharp me-1"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                <a href="{{ url('/admin/time/' . $item->id . '/edit') }}" title="Editar"><button class="shadow btn btn-primary btn-xs sharp me-1"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>

                                <form method="POST" action="{{ url('/admin/time' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="button" class="shadow btn btn-danger btn-xs sharp me-1 sweet-success-cancel" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{-- <div class="pagination-wrapper"> {!! $times->appends(['search' => Request::get('search')])->render() !!} </div> --}}
            </div>
        </div>
    </div>
</div>





