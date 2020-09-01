$(document).ready(function () {
  var funcion = "";
  var id_usuario = $("#id_usuario").val();
  var edit = false;
  buscar_usuario(id_usuario);

  function buscar_usuario(dato) {
    funcion = "buscar_usuario";
    $.post(
      "../controllers/UsuarioController.php",
      { dato, funcion },
      (response) => {
        let nombre = "";
        let apellidos = "";
        let edad = "";
        let dni = "";
        let tipo = "";
        let telefono = "";
        let residencia = "";
        let correo = "";
        let sexo = "";
        let adicional = "";
        const usuario = JSON.parse(response);
        nombre += `${usuario.nombre}`;
        apellidos += `${usuario.apellidos}`;
        edad += `${usuario.edad}`;
        dni += `${usuario.dni}`;
        if (usuario.tipo == "Root") {
          tipo += `<h1 class="badge badge-success">${usuario.tipo}</h1>`;
        }
        if (usuario.tipo == "Administrador") {
          tipo += `<h1 class="badge badge-warning">${usuario.tipo}</h1>`;
        }
        if (usuario.tipo == "Tecnico") {
          tipo += `<h1 class="badge badge-primary">${usuario.tipo}</h1>`;
        }
        telefono += `${usuario.telefono}`;
        residencia += `${usuario.residencia}`;
        correo += `${usuario.correo}`;
        sexo += `${usuario.sexo}`;
        adicional += `${usuario.adicional}`;
        $("#nombre_us").html(nombre);
        $("#apellidos_us").html(apellidos);
        $("#edad").html(edad);
        $("#dni_us").html(dni);
        $("#us_tipo").html(tipo);
        $("#telefono_us").html(telefono);
        $("#residencia_us").html(residencia);
        $("#correo_us").html(correo);
        $("#sexo_us").html(sexo);
        $("#adicional_us").html(adicional);
        $("#avatar2").attr("src", usuario.avatar);
        $("#avatar1").attr("src", usuario.avatar);
        $("#avatar3").attr("src", usuario.avatar);
        $("#avatar4").attr("src", usuario.avatar);
      }
    );
  }
  $(document).on("click", ".edit", (e) => {
    funcion = "capturar_datos";
    edit = true;
    $.post(
      "../controllers/UsuarioController.php",
      { funcion, id_usuario },
      (response) => {
        const usuario = JSON.parse(response);
        $("#telefono").val(usuario.telefono);
        $("#residencia").val(usuario.residencia);
        $("#correo").val(usuario.correo);
        $("#sexo").val(usuario.sexo);
        $("#adicional").val(usuario.adicional);
      }
    );
  });
  $("#form-usuario").submit((e) => {
    if (edit == true) {
      let telefono = $("#telefono").val();
      let residencia = $("#residencia").val();
      let correo = $("#correo").val();
      let sexo = $("#sexo").val();
      let adicional = $("#adicional").val();
      funcion = "editar_usuario";
      $.post(
        "../controllers/UsuarioController.php",
        {
          id_usuario,
          funcion,
          telefono,
          residencia,
          correo,
          sexo,
          adicional,
        },
        (response) => {
          if (response == "editado") {
            Swal.fire("En hora buena!", "Editado correctamente!", "success");
            $("#form-usuario").trigger("reset");
          }
          edit = false;
          buscar_usuario(id_usuario);
        }
      );
    } else {
      Swal.fire(
        "Oops, vuelve a intentarlo!",
        "No es posible editar el usuario!",
        "error"
      );
      $("#form-usuario").trigger("reset");
    }
    e.preventDefault();
  });
  $("#form-pass").submit((e) => {
    let oldpass = $("#oldpass").val();
    let newpass = $("#newpass").val();
    funcion = "cambiar_contra";
    $.post(
      "../controllers/UsuarioController.php",
      { id_usuario, funcion, oldpass, newpass },
      (response) => {
        if (response == "update") {
          Swal.fire(
            "Proceso completado!",
            "La contraseña ha sido cambiada correctamente!",
            "success"
          );
          $("#form-pass").trigger("reset");
        } else {
          Swal.fire(
            "Oops, algo salió mal!",
            "Introduce tu contraseña actual correctamente!",
            "error"
          );
          $("#form-pass").trigger("reset");
        }
      }
    );
    e.preventDefault();
  });
  $("#form-foto").submit((e) => {
    let formData = new FormData($("#form-foto")[0]);
    $.ajax({
      url: "../controllers/UsuarioController.php",
      type: "POST",
      data: formData,
      cache: false,
      processData: false,
      contentType: false,
    }).done(function (response) {
      const json = JSON.parse(response);
      if (json.alert == "edit") {
        $("#avatar1").attr("src", json.ruta);
        Swal.fire(
          "Proceso completado!",
          "Foto de perfil actualizada con éxito!",
          "success"
        );
        $("#form-foto").trigger("reset");
        buscar_usuario(id_usuario);
      } else {
        Swal.fire(
          "Oops, algo salió mal!",
          "El formato del archivo no es el correcto!",
          "error"
        );
        $("#form-foto").trigger("reset");
      }
    });
    e.preventDefault();
  });
});
