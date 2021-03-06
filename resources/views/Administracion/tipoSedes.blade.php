<x-sidebar-layout>
    <div class="container-xl py-5 border-bottom">
        <div class="row align-items-center">
            <div class="col-md-6 col-12 mb-3 mb-md-0">
                <h3 class="mb-0 ls-tight text-muted">
                    Tipo de Sedes
                </h3>
            </div>

            <div class="col-md-6 col-12 text-md-end">
                <div class="mx-n1">
                    <button type="button" class="btn d-inline-flex btn-sm btn-primary mx-1" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <span class=" pe-2">
                            <i class="bi bi-plus"></i>
                        </span>
                        <span>Crear</span>
                    </button>
                </div>
            </div>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 20px 0">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin: 20px 0">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nueva Empresa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="frmNewTipoSede" method="POST" action="{{ route('registerTipoSede') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="tipoSede" class="col-form-label">Empresa:</label>
                                <input type="text" class="form-control" id="tipoSede" name="tipoSede"
                                    placeholder="Nombre del tipo de sede" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="col-form-label">Descripci??n:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" value="Registrar" class="btn btn-primary" form="frmNewTipoSede">
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5">
            @if (count($tipoSedes) > 0)
                <div class="table-responsive" style="height: 75vh">
                    <table class="table align-middle table-striped" style="white-space: nowrap;">
                        <thead class="table-dark">
                            <tr>
                                <td>Codigo Tipo Sede</td>
                                <td>Tipo de Sede</td>
                                <td>Descripcion</td>
                                <td>Fecha de registro</td>
                                <td>Estado</td>
                                <td>Opciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tipoSedes as $tipoSedes)
                                <tr>
                                    <td>{{ $tipoSedes->idTipoSede }}</td>
                                    <td>{{ $tipoSedes->tipoSede }}</td>
                                    <td>{{ $tipoSedes->descripcion }}</td>
                                    <td>{{ $tipoSedes->createdAt }}</td>
                                    <td>
                                        @if ($tipoSedes->estado == 1)
                                            <span class="badge bg-success">Activa</span>
                                        @else
                                            <span class="badge bg-danger">Inactiva</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($tipoSedes->estado == 1)
                                            <button type="button" class="btn btn-danger btn-sm btnDeleteTipoSede"
                                                value="{{ $tipoSedes->idTipoSede }}" estado="1"><i
                                                    class="bi bi-trash"></i></button>
                                        @else
                                            <button type="button" class="btn btn-secondary btn-sm btnDeleteTipoSede"
                                                value="{{ $tipoSedes->idTipoSede }}" estado="0"><i
                                                    class="bi bi-trash"></i></button>
                                        @endif
                                        <button type="button" class="btn btn-info btn-sm btnUpdateTipoSede"
                                            value="{{ $tipoSedes->idTipoSede }}">
                                            <i class="bi bi-pencil-square"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form id="frmDeleteTipoSede" method="POST" action="{{ route('deleteTipoSede') }}">
                        @csrf
                        <input type="text" name="idTipoSede" id="idTipoSede" hidden>
                        <input type="text" name="estado" id="estado" hidden>
                    </form>

                    <div class="modal fade" id="modalEditTipoSede" tabindex="-1"
                        aria-labelledby="modalEditTipoSedeLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditTipoSedeLabel">Editar datos de tipo sede</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="frmEditEmpresa" method="POST"
                                        action="{{ route('updateTipoSede') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" name="idTipoSede" id="idTipoSede" hidden>
                                            <label for="tipoSede" class="col-form-label">Empresa:</label>
                                            <input type="text" class="form-control" id="tipoSede"
                                                name="tipoSede" placeholder="Nombre del tipo de sede" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="descripcion" class="col-form-label">Descripci??n:</label>
                                            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <input type="submit" value="Registrar" class="btn btn-primary"
                                        form="frmEditEmpresa">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="font-semibold text-center">
                    <h3 class="text-muted">Aun no tienes tipo de sedes registradas</h3>
                    <img class="opacity-40" src="{{ asset('img/icons/no-data.gif') }}" alt="">
                </div>
            @endif
        </div>
    </div>


</x-sidebar-layout>
