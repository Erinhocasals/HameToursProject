<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>Imagen #{{ $image->id }}</h4>
            <div class="flex">
                <a href="{{ $image->imageable->backendLink() }}" title="Regresar"><button class="mr-1 shadow btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                <a href="{{ url('/admin/images/' . $image->id . '/edit') }}" title="Editar"><button class="mr-1 shadow btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                <form method="POST" action="{{ url('admin/images' . '/' . $image->id) }}" accept-charset="UTF-8" style="display:inline">
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
                            <th>ID</th><td>{{ $image->id }}</td>
                        </tr>
                        <tr><th> Etiqueta </th><td> {{ $image->tag }} </td></tr>
                        <tr><th> Imagen </th><td><img class="h-48 shadow rounded-sm object-cover" src="{{ asset('storage/' . $image->url) }}" /></td></tr>
                        <tr><th> Pertenece </th><td> <a href="{{ $image->imageable->backendLink() }}" <span class="badge badge-sm light badge-primary">{{ $image->imageable->title }}</span> </a> </td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
