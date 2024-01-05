<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>Reservaciones</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example3" class="display">
                    <thead>
                        <tr>
                            <th class="align-middle">Id</th>
                            <th class="align-middle pe-7">Creación</th>
                            <th class="align-middle" style="min-width: 12.5rem;">Productos</th>
                            <th class="align-middle text-end">Estado</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr class="btn-reveal-trigger">
                                <td class="py-2">
                                    <a href="{{ route('admin.reservations.show', ['reservation' => $reservation]) }}">
                                        <strong>#{{ $reservation->id }}</strong></a></td>
                                <td class="py-2">{{ $reservation->created_at }}</td>
                                <td class="py-2">
                                    @foreach ($reservation->elements as $element)
                                        <a href="{{ $element->elementable->backendLink() }}"><span class="badge light badge-primary">{{ $element->elementable->title }}</span> </a>
                                    @endforeach
                                </td>
                                <td class="py-2 text-end"><span class="badge badge-sm light badge-primary text-white" style="background: {{ $reservation->status->color }}">{{ $reservation->status->title }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
