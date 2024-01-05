<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>Precio #{{ $price->id }}</h4>
            <div class="flex">
                <a href="{{ $price->priceable->backendLink() }}" title="Regresar"><button class="mr-1 shadow btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                <a href="{{ url('/admin/prices/' . $price->id . '/edit') }}" title="Editar"><button class="mr-1 shadow btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                <form method="POST" action="{{ url('admin/prices' . '/' . $price->id) }}" accept-charset="UTF-8" style="display:inline">
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
                            <th>ID</th><td>{{ $price->id }}</td>
                        </tr>
                        <tr><th> Título</th><td> {{ $price->title }} </td></tr>
                        <tr><th> Línea superior</th><td> {{ $price->top_line }} </td></tr>
                        <tr><th> Precio </th><td> {{ $price->price }} @if ($price->countryOrContinent()) {{ $price->countryOrContinent()->currency_code }} @else $ @endif </td></tr>
                        <tr><th> Línea inferior </th><td> {!! $price->bottom_line !!} </td></tr>
                        <tr><th> Proveedor </th><td> {{ $price->supplier }} </td></tr>
                        <tr><th> Costo </th><td> {{ $price->cost }} </td></tr>
                        <tr><th> Fecha de Inicio </th><td> {{ $price->date_start }} </td></tr>
                        <tr><th> Fecha de Fin </th><td> {{ $price->date_end }} </td></tr>
                        <tr><th> Habilitado </th><td> {{ $price->enabled }} </td></tr>
                        <tr><th> Mostrar en el listado </th><td> {{ $price->show_in_listing }} </td></tr>
                        <tr><th> Pertenece </th><td> @if (isset($price->priceable)) <a href="{{ $price->priceable->backendLink() }}"> <span class="badge badge-sm light badge-primary">{{ $price->priceable->title }}</span> </a> @endif </td></tr>
                        <tr><th> País/Región </th>
                            <td>
                                @if ($price->country_code)
                                    <span class="badge badge-sm light badge-primary">{{ $price->countryOrContinent()->emoji }} {{ $price->countryOrContinent()->name }}</span>
                                @else
                                    <span class="badge badge-sm light badge-light">por defecto</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
