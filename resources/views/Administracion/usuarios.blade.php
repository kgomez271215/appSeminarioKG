<x-sidebar-layout>
    <div class="container-xl py-5 border-bottom">
        <div class="row align-items-center">
            <div class="col-md-6 col-12 mb-3 mb-md-0">
                <h3 class="mb-0 ls-tight text-muted">
                    Usuarios Administrativos
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
                        <form id="frmNewEmpresa" method="POST" action="{{ route('registerSede') }}">
                            @csrf
                            <div class="mb-3">

                                <label for="sede" class="col-form-label">Sede:</label>
                                <input type="text" class="form-control" id="sede" name="sede"
                                    placeholder="Nombre de Sede" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="col-form-label">Descripcion:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="idTipoSede" class="col-form-label">Tipo de Sede:</label>
                                </label>
                                <select name="idTipoSede" id="idTipoSede" class="form-control" required>
                                    <option>Seleccione un tipo de sede</option>

                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" value="Registrar" class="btn btn-primary" form="frmNewEmpresa">
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5">
            @if (count($usuarios) > 0)
                <div class="table-responsive" style="height: 75vh">
                    <table class="table align-middle table-striped" style="white-space: nowrap;">
                        <thead class="table-dark">
                            <tr>
                                <td>Codigo Usuario</td>
                                <td>Nombres</td>
                                <td>Apellidos</td>
                                <td>Rol</td>
                                <td>Correo</td>
                                <td>Empresa</td>
                                <td>Fecha de registro</td>
                                <td>Estado</td>
                                <td>Opciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuarios)
                                <tr>
                                    <td>{{ $usuarios->idUser }}</td>
                                    <td>{{ $usuarios->Datos->nombres }}</td>
                                    <td>{{ $usuarios->Datos->apellidos }}</td>
                                    <td>{{ $usuarios->Rol->rol }}</td>
                                    <td>{{ $usuarios->email }}</td>
                                    <td>{{ $usuarios->Empresa->empresa }}</td>
                                    <td>{{ $usuarios->createdAt }}</td>
                                    <td>
                                        @if ($usuarios->estado == 1)
                                            <span class="badge bg-success">Activo</span>
                                        @else
                                            <span class="badge bg-danger">Inactivo</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($usuarios->estado == 1)
                                            <button type="button" class="btn btn-danger btn-sm btnDeleteSede"
                                                value="{{ $usuarios->idUser }}" estado="1"><i
                                                    class="bi bi-trash"></i></button>
                                        @else
                                            <button type="button" class="btn btn-secondary btn-sm btnDeleteSede"
                                                value="{{ $usuarios->idUser }}" estado="0"><i
                                                    class="bi bi-trash"></i></button>
                                        @endif
                                        <button type="button" class="btn btn-info btn-sm btnUpdateSede"
                                            value="{{ $usuarios->idUser }}">
                                            <i class="bi bi-pencil-square"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form id="frmDeleteSede" method="POST" action="{{ route('deleteSede') }}">
                        @csrf
                        <input type="text" name="idSede" id="idSede" hidden>
                        <input type="text" name="estado" id="estado" hidden>
                    </form>

                    <div class="modal fade" id="modalEditSede" tabindex="-1" aria-labelledby="modalEditSedeLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditSedeLabel">Editar datos de Empresa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="frmEditSede" method="POST" action="{{ route('updateSede') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" name="idSede" id="idSede" hidden>
                                            <label for="sede" class="col-form-label">Sede:</label>
                                            <input type="text" class="form-control" id="sede" name="sede"
                                                placeholder="Nombre de Sede" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="descripcion" class="col-form-label">Descripcion:</label>
                                            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="idTipoSede" class="col-form-label">Tipo de Sede:
                                                <label for="" id="lblTipoSede" style="color:green"></label>
                                            </label>
                                            <select name="idTipoSede" id="idTipoSede" class="form-control" required>
                                                <option id="optDefault" value="">Valor actual</option>

                                            </select>
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <input type="submit" value="Registrar" class="btn btn-primary"
                                        form="frmEditSede">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="font-semibold text-center">
                    <h3 class="text-muted">Aun no tienes usuarios registrados</h3>
                    <img class="opacity-40" src="{{ asset('img/icons/no-data.gif') }}" alt="">
                </div>
            @endif
        </div>
    </div>


</x-sidebar-layout>
