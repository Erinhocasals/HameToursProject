<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>{{ $experience->title }}</h4>
            <div class="flex">
                <a href="{{ url('/admin/experiences') }}" title="Regresar"><button class="mr-1 shadow btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                <a href="{{ url('/admin/experiences/' . $experience->id . '/edit') }}" title="Editar"><button class="mr-1 shadow btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                <form method="POST" action="{{ url('admin/experiences' . '/' . $experience->id) }}" accept-charset="UTF-8" style="display:inline">
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
                            <th>ID</th><td>{{ $experience->id }}</td>
                        </tr>
                        <tr><th> Título </th><td> {{ $experience->title }} </td></tr>
                        {{-- <tr><th> Summary </th><td> {{ $experience->summary }} </td></tr> --}}
                        <tr><th> Descripción </th><td> {!! $experience->content !!} </td></tr>
                        <tr><th> Imagen </th><td> @if ($experience->image) <img class="h-48 shadow rounded-sm object-cover" src="{{ asset('storage/' . $experience->image->url) }}" /> @endif </td></tr>
                        <tr><th> Habilitado </th><td> {{ $experience->enabled }} </td></tr>
                        <tr><th> Entidades </th><td>
                            @foreach ($experience->entities as $entity)
                                <a href="{{ $entity->backendLink() }}" <span class="badge badge-sm light badge-primary">{{ $entity->title }}</span> </a>
                            @endforeach
                        </td></tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
