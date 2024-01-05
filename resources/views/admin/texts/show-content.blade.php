<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>{{ $text->title }}</h4>
            <div class="flex">
                <a href="{{ $text->textable->backendLink() }}" title="Regresar"><button class="mr-1 shadow btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                <a href="{{ url('/admin/texts/' . $text->id . '/edit') }}" title="Editar"><button class="mr-1 shadow btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                <form method="POST" action="{{ url('admin/texts' . '/' . $text->id) }}" accept-charset="UTF-8" style="display:inline">
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
                            <th>ID</th><td>{{ $text->id }}</td>
                        </tr>
                        <tr><th> Título </th><td> {{ $text->title }} </td></tr>
                        <tr><th> Descripción </th><td> {!! $text->content !!} </td></tr>
                        <tr><th> Imagen </th><td> @if ($text->image) <a href="{{ route('admin.images.show', ['image' => $text->image]) }}"> <img class="h-48 rounded-sm object-cover" src="{{ asset('storage/' . $text->image->url) }}" /> </a> @endif </td></tr>
                        <tr><th> Habilitado </th><td> {{ $text->enabled }} </td></tr>
                        <tr><th> Pertenece </th><td> <a href="{{ $text->textable->backendLink() }}"> <span class="badge badge-sm light badge-primary">{{ $text->textable->title }}</span> </a></td></tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
