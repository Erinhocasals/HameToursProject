<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>Intro #{{ $intro->id }}</h4>
            <div class="flex">
                <a href="{{ $intro->introable->backendLink() }}" title="Regresar"><button class="mr-1 shadow btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                <a href="{{ url('/admin/intros/' . $intro->id . '/edit') }}" title="Editar"><button class="mr-1 shadow btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                <form method="POST" action="{{ url('admin/intros' . '/' . $intro->id) }}" accept-charset="UTF-8" style="display:inline">
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
                            <th>ID</th><td>{{ $intro->id }}</td>
                        </tr>
                        <tr><th> Título </th><td> {!! $intro->title !!} </td></tr>
                        <tr><th> Subtítulo </th><td> {!! $intro->subtitle !!} </td></tr>
                        <tr><th> Descripción </th><td> {!! $intro->content !!} </td></tr>
                        <tr><th> Imagen Grande </th>
                            <td>
                                @if ($intro->big_image)
                                    <img class="h-48 shadow rounded-sm object-cover" src="{{ asset('storage/' . $intro->big_image) }}" />
                                    <a href="{{ route('admin.intro.delete.image', ['id' => $intro->id, 'type' => 'big_image']) }}" title="Eliminar"><button class="mr-1 shadow btn btn-danger btn-sm float-right"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button></a>
                                @endif
                            </td>
                        </tr>
                        <tr><th> Imagen Pequeña </th><td> @if ($intro->small_image) <img class="h-48 shadow rounded-sm object-cover" src="{{ asset('storage/' . $intro->small_image) }}" /> @endif </td></tr>
                        <tr><th> Habilitado </th><td> {{ $intro->enabled }} </td></tr>
                        <tr><th> Pertenece </th><td> @if ($intro->introable)<a href="{{ $intro->introable->backendLink() }}"> <span class="badge badge-sm light badge-primary">{{ $intro->introable->title }}</span> </a>@endif </td></tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
