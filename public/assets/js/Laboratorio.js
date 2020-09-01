$(document).ready(function () {
  buscar_lab();
  var funcion;
  var edit = false;
  $("#form-crear-laboratorio").submit((e) => {
    let nombre_laboratorio = $("#nombre-laboratorio").val();
    let id_editado = $("#id_editar_lab").val();
    if (edit == false) {
      funcion = "crear";
    } else {
      funcion = "editar";
    }
    $.post(
      "../controllers/LaboratorioController.php",
      { nombre_laboratorio, id_editado, funcion },
      (response) => {
        if (response == "add" || response == "add-laboratorio") {
          Swal.fire(
            "Proceso completado!",
            "Laboratorio registrado correctamente!",
            "success"
          );
          $("#form-crear-laboratorio").trigger("reset");
          buscar_lab();
        }
        if (response == "noadd" || response == "noadd-laboratorio") {
          Swal.fire(
            "Oops, vuelve a intentarlo!",
            "El laboratorio ya existe en el sistema!",
            "error"
          );
          $("#form-crear-laboratorio").trigger("reset");
        }
        if (response == "edit" || response == "edit-laboratorio") {
          Swal.fire(
            "Proceso completado!",
            "Laboratorio actualizado correctamente!",
            "success"
          );
          $("#form-crear-laboratorio").trigger("reset");
          buscar_lab();
          edit = false;
        }
        edit == false;
      }
    );
    e.preventDefault();
  });
  function buscar_lab(consulta) {
    funcion = "buscar";
    $.post(
      "../controllers/LaboratorioController.php",
      { consulta, funcion },
      (response) => {
        const laboratorios = JSON.parse(response);
        let template = "";
        laboratorios.forEach((laboratorio) => {
          template += `
            <tr labId="${laboratorio.id}" labNombre="${laboratorio.nombre}" labAvatar="${laboratorio.avatar}">
                <td>${laboratorio.nombre}</td>
                <td>
                    <img src="${laboratorio.avatar}" class="img-fluid rounded" width="70" heigth="70">
                </td>
                <td>
                    <button class="avatar btn btn-primary" title="Cambiar logo del laboratorio" type="button" data-toggle="modal" data-target="#cambiologo">
                        <i class="far fa-image"></i>
                    </button>
                    <button class="editar btn btn-warning" title="Editar el laboratorio" type="button" data-toggle="modal" data-target="#crearlaboratorio">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="borrar btn btn-danger" title="Eliminar el laboratorio">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
          `;
        });
        $("#laboratorios").html(template);
      }
    );
  }
  $(document).on("keyup", "#buscar-laboratorio", function () {
    let valor = $(this).val();
    if (valor != "") {
      buscar_lab(valor);
    } else {
      buscar_lab();
    }
  });
  $(document).on("click", ".avatar", (e) => {
    funcion = "cambiar_logo";
    const elemento = $(this)[0].activeElement.parentElement.parentElement;
    const id = $(elemento).attr("labId");
    const nombre = $(elemento).attr("labNombre");
    const avatar = $(elemento).attr("labAvatar");
    $("#logoactual").attr("src", avatar);
    $("#nombre_logo").html(nombre);
    $("#funcion").val(funcion);
    $("#id_logo_lab").val(id);
  });
  $("#form-logo").submit((e) => {
    let formData = new FormData($("#form-logo")[0]);
    $.ajax({
      url: "../controllers/LaboratorioController.php",
      type: "POST",
      data: formData,
      cache: false,
      processData: false,
      contentType: false,
    }).done(function (response) {
      const json = JSON.parse(response);
      if (json.alert == "edit") {
        $("#logoactual").attr("src", json.ruta);
        $("#form-logo").trigger("reset");
        Swal.fire(
          "Proceso completado!",
          "Logo actualizado correctamente!",
          "success"
        );
        buscar_lab();
      } else {
        Swal.fire(
          "Oops, vuelve a intentarlo!",
          "El formato del archivo no es el correcto, verifique por favor!",
          "error"
        );
        $("#form-logo").trigger("reset");
      }
    });
    e.preventDefault();
  });
  $(document).on("click", ".borrar", (e) => {
    funcion = "borrar";
    const elemento = $(this)[0].activeElement.parentElement.parentElement;
    const id = $(elemento).attr("labId");
    const nombre = $(elemento).attr("labNombre");
    const avatar = $(elemento).attr("labAvatar");
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: "btn btn-success",
        cancelButton: "btn btn-danger mr-1",
      },
      buttonsStyling: false,
    });
    swalWithBootstrapButtons
      .fire({
        title: "¿Está seguro de eliminar el laboratorio " + nombre + "?",
        text: "No podrás revertir este proceso!",
        imageUrl: "" + avatar + "",
        imageWidth: 100,
        imageHeight: 100,
        showCancelButton: true,
        confirmButtonText: "Si, borrar!",
        cancelButtonText: "No, cancelar!",
        reverseButtons: true,
      })
      .then((result) => {
        if (result.value) {
          $.post(
            "../controllers/LaboratorioController.php",
            { id, funcion },
            (response) => {
              edit = false;
              if (response == "borrado") {
                swalWithBootstrapButtons.fire(
                  "Eliminado!",
                  "El laboratorio " + nombre + " ha sido eliminado.",
                  "success"
                );
                buscar_lab();
              } else {
                swalWithBootstrapButtons.fire(
                  "Error al eliminar!",
                  "El laboratorio " +
                    nombre +
                    " no se puede eliminar porque hay productos de procedencia.",
                  "error"
                );
              }
            }
          );
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          swalWithBootstrapButtons.fire(
            "Cancelado",
            "El laboratorio " + nombre + " esta a salvo.",
            "error"
          );
        }
      });
  });
  $(document).on("click", ".editar", (e) => {
    funcion = "cambiar_logo";
    const elemento = $(this)[0].activeElement.parentElement.parentElement;
    const id = $(elemento).attr("labId");
    const nombre = $(elemento).attr("labNombre");
    const avatar = $(elemento).attr("labAvatar");
    $("#id_editar_lab").val(id);
    $("#nombre-laboratorio").val(nombre);
    edit = true;
  });
});
