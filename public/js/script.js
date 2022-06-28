
$('.btnDelete').on('click', function () {
    let id = $(this).val();
    let tipo = $(this).attr('estado')
    if (tipo == 1) {
        title2 = '¿Desea inactivar la empresa seleccionada?'
    } else {
        title2 = '¿Desea activar la empresa seleccionada?'
    }
    Swal.fire({
        title: title2,
        showDenyButton: true,
        confirmButtonText: 'Confirmar',
        denyButtonText: `Cancelar`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $('#idEmpresa').val(id)
            $('#estado').val(tipo)
            $('#frmDeleteEmpresa').submit();
        } else if (result.isDenied) {
            $('#idEmpresa').val("")
        }
    })
});


$('.btnUpdate').on('click', function () {
    let id = $(this).val();
    var laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    axios.get('http://localhost:3000/api/v1/Empresas/'+id)
        .then(function (response) {
            $('#modalEditEmpresa #idEmpresa').val(response.data.idEmpresa);
            $('#modalEditEmpresa #empresa').val(response.data.empresa);
            $('#modalEditEmpresa #descripcion').val(response.data.descripcion);
            $('#modalEditEmpresa #vision').val(response.data.vision);
            $('#modalEditEmpresa #mision').val(response.data.mision);

            $('#modalEditEmpresa').modal('show');
            console.log(response.data);
        })
        .catch(function (error) {
            Swal.fire({
                icon: 'error',
                title: 'Ha ocurrido un error',
                text: 'No se ha podido capturar los datos del registro a editar, prueba recargar la pagina'
              })
            console.log(error);
        });
    ;
})

$('.btnDeleteTipoSede').on('click', function () {
    let id = $(this).val();
    let tipo = $(this).attr('estado')
    if (tipo == 1) {
        title2 = '¿Desea inactivar el tipo de sede seleccionada?'
    } else {
        title2 = '¿Desea activar el tipo de sede seleccionada?'
    }
    Swal.fire({
        title: title2,
        showDenyButton: true,
        confirmButtonText: 'Confirmar',
        denyButtonText: `Cancelar`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $('#frmDeleteTipoSede #idTipoSede').val(id)
            $('#frmDeleteTipoSede #estado').val(tipo)
            $('#frmDeleteTipoSede').submit();
        } else if (result.isDenied) {
            $('#frmDeleteTipoSede #idTipoSede').val("")
        }
    })
});

$('.btnUpdateTipoSede').on('click', function () {
    let id = $(this).val();
    var laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    axios.get('http://localhost:3000/api/v1/TipoSedes/'+id)
        .then(function (response) {
            $('#modalEditTipoSede #idTipoSede').val(response.data.idTipoSede);
            $('#modalEditTipoSede #tipoSede').val(response.data.tipoSede);
            $('#modalEditTipoSede #descripcion').val(response.data.descripcion);

            $('#modalEditTipoSede').modal('show');
            console.log(response.data);
        })
        .catch(function (error) {
            Swal.fire({
                icon: 'error',
                title: 'Ha ocurrido un error',
                text: 'No se ha podido capturar los datos del registro a editar, prueba recargar la pagina'
              })
            console.log(error);
        });
    ;
})


$('.btnDeleteSede').on('click', function () {
    let id = $(this).val();
    let tipo = $(this).attr('estado')
    if (tipo == 1) {
        title2 = '¿Desea inactivar la sede seleccionada?'
    } else {
        title2 = '¿Desea activar la sede seleccionada?'
    }
    Swal.fire({
        title: title2,
        showDenyButton: true,
        confirmButtonText: 'Confirmar',
        denyButtonText: `Cancelar`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $('#frmDeleteSede #idSede').val(id)
            $('#frmDeleteSede #estado').val(tipo)
            $('#frmDeleteSede').submit();
        } else if (result.isDenied) {
            $('#frmDeleteSede #idSede').val("")
        }
    })
});

$('.btnUpdateSede').on('click', function () {
    let id = $(this).val();
    var laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    axios.get('http://localhost:3000/api/v1/Sedes/edit/'+id)
        .then(function (response) {
            $('#modalEditSede #idSede').val(response.data.idSede);
            $('#modalEditSede #sede').val(response.data.sede);
            $('#modalEditSede #descripcion').val(response.data.descripcion);
            $('#modalEditSede #lblTipoSede').text("Actual: "+response.data.Tipo.tipoSede);
            $('#modalEditSede #optDefault').val(response.data.idTipoSede);
            $('#modalEditSede #optDefault').text(response.data.Tipo.tipoSede);


            $('#modalEditSede').modal('show');
            console.log(response.data);
        })
        .catch(function (error) {
            Swal.fire({
                icon: 'error',
                title: 'Ha ocurrido un error',
                text: 'No se ha podido capturar los datos del registro a editar, prueba recargar la pagina'
              })
            console.log(error);
        });
    ;
})
