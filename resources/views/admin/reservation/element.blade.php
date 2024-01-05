<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>{{ $element->elementable->title }}</h4>
            <div class="flex">
                <form method="POST" action="{{ url('admin/reservation' . '/' . $element->id) }}" accept-charset="UTF-8" style="display:inline">
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
                        <tr><th>ID</th><td>{{ $element->id }}</td></tr>
                        <tr><th>Elemento</th><td> <a href="{{ $element->elementable->backendLink() }}"><span class="badge badge-sm light badge-primary">{{ $element->elementable->title }}</span></a> </td></tr>
                        <tr><th>Pertenece</th><td> @if ($element->parentable) <a href="{{ $element->parentable->backendLink() }}"><span class="badge badge-sm light badge-primary">{{ $element->parentable->title }}</span></a> @endif </td></tr>
                        <tr><th>Descripción</th><td> {{ $element->content }} </td></tr>
                        <tr><th>Cantidad</th><td>{{ $element->quantity }}</td></tr>
                        <tr><th>Fecha</th><td>{{ date('j F, Y', strtotime($element->date_start)) }} - {{ date('j F, Y', strtotime($element->date_end)) }} </td></tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
