$(document).ready(function () {
  var tipo_usuario = $("#tipo_usuario").val();
  if (tipo_usuario == 2) {
    $("#button-crear").hide();
  }
  buscar_datos();
  var funcion;
  function buscar_datos(consulta) {
    funcion = "buscar_usuarios_adm";
    $.post(
      "../controllers/UsuarioController.php",
      { consulta, funcion },
      (response) => {
        const usuarios = JSON.parse(response);
        let template = "";
        usuarios.forEach((usuario) => {
          template += `<div usuarioId="${usuario.id}" class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                  <div class="card-header text-muted border-bottom-0">`;
          if (usuario.tipo_usuario == 3) {
            template += `<h1 class="badge badge-success">${usuario.tipo}</h1>`;
          }
          if (usuario.tipo_usuario == 1) {
            template += `<h1 class="badge badge-warning">${usuario.tipo}</h1>`;
          }
          if (usuario.tipo_usuario == 2) {
            template += `<h1 class="badge badge-primary">${usuario.tipo}</h1>`;
          }
          template += `</div>
                  <div class="card-body pt-0">
                      <div class="row">
                          <div class="col-7">
                              <h2 class="lead"><b>${usuario.nombre} ${usuario.apellidos}</b></h2>
                              <p class="text-muted text-sm"><b>Sobre mí: </b> ${usuario.adicional} </p>
                              <ul class="ml-4 mb-0 fa-ul text-muted">
                                  <li class="small"><span class="fa-li"><i class="fas fa-id-card"></i></span> <b>DNI:</b> ${usuario.dni}</li>
                                  <li class="small"><span class="fa-li"><i class="fas fa-birthday-cake"></i></span> <b>Edad:</b> ${usuario.edad}</li>
                                  <li class="small"><span class="fa-li"><i class="fas fa-map-marker-alt"></i></span> <b>Dirección:</b> ${usuario.residencia}</li>
                                  <li class="small"><span class="fa-li"><i class="fas fa-phone"></i></span> <b>Teléfono #:</b> ${usuario.telefono}</li>
                                  <li class="small"><span class="fa-li"><i class="fas fa-at"></i></span> <b>Correo :</b> ${usuario.correo}</li>
                                  <li class="small"><span class="fa-li"><i class="fas fa-smile-wink"></i></span> <b>Sexo :</b> ${usuario.sexo}</li>
                              </ul>
                          </div>
                          <div class="col-5 text-center">
                              <img src="${usuario.avatar}" alt="" class="img-circle img-fluid">
                          </div>
                      </div>
                  </div>
                  <div class="card-footer">
                      <div class="text-right">`;
          if (tipo_usuario == 3) {
            if (usuario.tipo_usuario != 3) {
              template += `
                          <button class="borrar-usuario btn btn-danger mr-1" type="button" data-toggle="modal" data-target="#confirmar">
                          <i class="fas fa-trash-alt mr-1"></i>Eliminar
                        </button>
                          `;
            }
            if (usuario.tipo_usuario == 2) {
              template += `
              <button class="ascender btn btn-success ml-1" type="button" data-toggle="modal" data-target="#confirmar">
              <i class="fas fa-sort-amount-up mr-1"></i>Ascender
            </button>
              `;
            }
            if (usuario.tipo_usuario == 1) {
              template += `
              <button class="descender btn btn-secondary ml-1" type="button" data-toggle="modal" data-target="#confirmar">
              <i class="fas fa-sort-amount-down mr-1"></i>Descender
            </button>
              `;
            }
          } else {
            if (
              tipo_usuario == 1 &&
              usuario.tipo_usuario != 1 &&
              usuario.tipo_usuario != 3
            ) {
              template += `
              <button class="borrar-usuario btn btn-danger mr-1" type="button" data-toggle="modal" data-target="#confirmar">
              <i class="fas fa-trash-alt mr-1"></i>Eliminar
            </button>
              `;
            }
          }
          template += `</div>
                  </div>
              </div>
          </div>
              `;
        });
        $("#usuarios").html(template);
      }
    );
  }
  $(document).on("keyup", "#buscar", function () {
    let valor = $(this).val();
    if (valor != "") {
      buscar_datos(valor);
    } else {
      buscar_datos();
    }
  });
  $("#form-crear").submit((e) => {
    let nombre = $("#nombre").val();
    let apellido = $("#apellido").val();
    let edad = $("#edad").val();
    let dni = $("#dni").val();
    let pass = $("#pass").val();
    funcion = "crear_usuario";
    $.post(
      "../controllers/UsuarioController.php",
      {
        nombre,
        apellido,
        edad,
        dni,
        pass,
        funcion,
      },
      (response) => {
        if (response == "add") {
          Swal.fire(
            "Proceso completado!",
            "El usuario se registró correctamente!",
            "success"
          );
          $("#form-crear").trigger("reset");
          buscar_datos();
        } else {
          Swal.fire(
            "Oops, vuelve a intentarlo!",
            "El DNI ya existe, verificar por favor!",
            "error"
          );
          $("#form-crear").trigger("reset");
        }
      }
    );
    e.preventDefault();
  });
  $(document).on("click", ".ascender", (e) => {
    const elemento = $(this)[0].activeElement.parentElement.parentElement
      .parentElement.parentElement;
    const id = $(elemento).attr("usuarioId");
    funcion = "ascender";
    $("#id_user").val(id);
    $("#funcion").val(funcion);
  });
  $(document).on("click", ".descender", (e) => {
    const elemento = $(this)[0].activeElement.parentElement.parentElement
      .parentElement.parentElement;
    const id = $(elemento).attr("usuarioId");
    funcion = "descender";
    $("#id_user").val(id);
    $("#funcion").val(funcion);
  });
  $(document).on("click", ".borrar-usuario", (e) => {
    const elemento = $(this)[0].activeElement.parentElement.parentElement
      .parentElement.parentElement;
    const id = $(elemento).attr("usuarioId");
    funcion = "borrar-usuario";
    $("#id_user").val(id);
    $("#funcion").val(funcion);
  });
  $("#form-confirmar").submit((e) => {
    let pass = $("#oldpass").val();
    let id_usuario = $("#id_user").val();
    funcion = $("#funcion").val();
    $.post(
      "../controllers/UsuarioController.php",
      { pass, id_usuario, funcion },
      (response) => {
        if (
          response == "ascendido" ||
          response == "descendido" ||
          response == "confirmado" ||
          response == "borrado"
        ) {
          Swal.fire(
            "Proceso completado!",
            "El usuario se modificó correctamente!",
            "success"
          );
          $("#form-confirmar").trigger("reset");
        } else {
          Swal.fire(
            "Oops, vuelve a intentarlo!",
            "Verifique si la contraseña es la correcta!",
            "error"
          );
          $("#form-confirmar").trigger("reset");
        }
        buscar_datos();
      }
    );
    e.preventDefault();
  });
});
