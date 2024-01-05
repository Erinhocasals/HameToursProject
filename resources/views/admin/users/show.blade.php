@extends('layouts.admin.global')

@prepend('styles')
<link href="{{ asset('admin-template/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin-template/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
@endprepend

@prepend('scripts')
<script src="{{ asset('admin-template/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin-template/js/plugins-init/datatables.init.js') }}"></script>
<script src="{{ asset('admin-template/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script>
    (document.querySelectorAll(".sweet-success-cancel").forEach(item => {
        item.addEventListener('click', event => {
            swal.fire({
                title: "¿Está seguro que desea eliminar el elemento?",
                text: "No podrá recuperar este elemento una vez lo haya borrado !!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#f72b50",
                confirmButtonText: "Sí, elimínalo !!",
                cancelButtonText: "Cancelar !!",
                closeOnConfirm: !1,
                closeOnCancel: !1,
            }).then((result) => {
                if (result.value) {
                    item.closest('form').submit();
                }
            });
        })
    }) )
</script>
@endprepend

@section('content')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Usuarios</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $user->name }}</a></li>
        </ol>
    </div>

    @include('badge-errors')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $user->name }}</h4>
                    <div class="flex">
                        <a href="{{ url('/admin/users') }}" title="Regresar"><button class="mr-1 shadow btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" title="Editar"><button class="mr-1 shadow btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        @if (Auth::user()->id != $user->id)
                            <form method="POST" action="{{ url('admin/users' . '/' . $user->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="button" class="shadow btn btn-danger btn-sm sweet-success-cancel" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $user->id }}</td>
                                </tr>
                                <tr><th> Nombre </th><td> {{ $user->name }} </td></tr>
                                <tr><th> Correo </th><td> {{ $user->email }} </td></tr>
                                <tr><th> Teléfono </th><td> {{ $user->phone }} </td></tr>
                                <tr><th> Roles </th><td>
                                    @foreach ($user->roles as $role)
                                        <span class="badge light badge-primary">{{ $role->name }}</span>
                                    @endforeach
                                </td></tr>
                                <tr><th> Beneficiarios </th><td>
                                    @foreach ($user->beneficiaries as $ben)
                                        <a href="{{ route('admin.beneficiary.show', ['beneficiary' => $ben->id]) }}"><span class="badge light badge-primary">{{ $ben->name }}</span></a>
                                    @endforeach
                                </td></tr>
                                <tr><th> KYC </th><td> @if ($user->kyc) <a href="{{ route('admin.kyc.show', ['kyc' => $user->kyc]) }}"><span class="badge light badge-primary">KYC</span></a> @else - @endif </td></tr>
                                <tr>
                                    <th> Árbol de Referidos </th>
                                    <td>
                                        <div class="nestable">
                                            <div class="dd" id="nestable">
                                                <ol class="dd-list">
                                                    {!! $user->nestableTree() !!}
                                                </ol>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                {{-- <tr><th> Referido Padre </th><td> @if ($user->currentTeam != $user->ownedTeams->first()) <a href="{{ route('admin.users.show', ['user' => $user->currentTeam->owner->id]) }}"> <span class="badge light badge-primary">{{ $user->currentTeam->name }}: {{ $user->currentTeam->owner->name }}</span> </a>  @else - @endif </td></tr>
                                <tr><th> Referidos </th><td>
                                    @foreach ($user->ownedTeams->first()->users as $ref)
                                        <a href="{{ route('admin.users.show', ['user' => $ref->id]) }}"> <span class="badge light badge-primary">{{ $ref->name }}</span> </a>
                                    @endforeach
                                </td></tr> --}}
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        @if ($user->hasRole('bank'))
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <h4 class="mb-0 fs-20 text-black">Banquero: Disponibilidad de Saldo</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($user->balance() as $balance)
                            <div class="bg-gradient-1 coin-holding mt-4 flex-wrap">
                                <div class="mb-2 coin-bx">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            @if ($balance['key'] == 'EUR')
                                                <img src="https://img.icons8.com/ios-filled/50/000000/euro-pound-exchange.png"/>
                                            @elseif ($balance['key'] == 'CUP')
                                                <img src="https://img.icons8.com/ios-filled/50/000000/delete-dollar.png"/>
                                            @elseif ($balance['key'] == 'USD')
                                                <img src="https://img.icons8.com/ios-filled/50/000000/us-dollar-circled--v2.png"/>
                                            @elseif ($balance['key'] == 'CRIPTO')
                                                <img src="https://img.icons8.com/ios-filled/50/000000/mts-money.png"/>
                                            @endif
                                        </div>
                                        <div class="ms-3">
                                            <h4 class="coin-font font-w600 mb-0">{{ $balance['key'] }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <h2 class="mb-0 text-primary coin-font-1">{{ $balance['value'] }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @include('admin.users.orders', ['reservations' => $user->reservations])

    </div>
@endsection
