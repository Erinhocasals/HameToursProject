<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>{{ $entitypackage->entity->title }}</h4>
            <div class="flex">
                {{-- <a href="{{ url('/admin/entity-package') }}" title="Regresar"><button class="mr-1 shadow btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a> --}}
                <a href="{{ url('/admin/entity-package/' . $entitypackage->id . '/edit') }}" title="Editar Producto"><button class="mr-1 shadow btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                <form method="POST" action="{{ url('admin/entity-package' . '/' . $entitypackage->id) }}" accept-charset="UTF-8" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="button" class="shadow btn btn-danger btn-sm sweet-success-cancel" title="Eliminar Producto"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>ID</th><td>{{ $entitypackage->id }}</td>
                        </tr>
                        <tr><th> Tiempo </th><td> {{ $entitypackage->time }} </td></tr>
                        <tr><th> Definición de Tiempo </th><td> {{ $entitypackage->time_definition }} </td></tr>
                        <tr><th> Producto </th><td> <a href="{{ $entitypackage->entity->backendLink() }}" <span class="badge badge-sm light badge-primary">{{ $entitypackage->entity->title }}</span> </a> </td></tr>
                        <tr><th> Paquete </th><td> <a href="{{ $entitypackage->package->backendLink() }}" <span class="badge badge-sm light badge-primary">{{ $entitypackage->package->title }}</span> </a> </td></tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
