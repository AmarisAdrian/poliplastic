$("#frmlogin").bind("submit", function () {
  var btnenviar = $("#btnenviar");
  $.ajax({
    type: $(this).attr("method"),
    url: $(this).attr("action"),
    data: $(this).serialize(),
    dataType: 'JSON',
    beforeSend: function () {
      btnenviar.val("Enviando");
      btnenviar.attr("disabled", "disabled");
    },
    success: function (data) {
      if (data.status == "error") {
        $("#MensajeError").html('<div id="MensajeError" class="alert alert-danger"><span>' + data.msj +'</span></div>');
         btnenviar.val("Inicia sesion");
         btnenviar.removeAttr("disabled");
          $(data).html({
            show: true,
          });
      } else {
        location.reload();
      }
    },
    complete: function () {
      btnenviar.val("Iniciar sesion");
      btnenviar.removeAttr("disabled");
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert("\nError: " + jqXHR.status + ' \nMensaje: ' + textStatus + ' \nestado ' + errorThrown);
    },
  });
  return false;
});

$("#frm_subir_explosion").bind("submit", function () {

  var btnenviar = $("#btn_subir_explosion");
  let file = $('#subir_archivo').val();
    var data = new FormData(this);
    $.ajax({
      type: $(this).attr("method"),
      url: $(this).attr("action"),
      processData: false,
      contentType: false,
      cache: false,
      dataType: "json",
      data: data,
      beforeSend: function () {
        btnenviar.text("Procesando archivos ");
        btnenviar.attr("disabled", "disabled");
        btnenviar.append('<span class="spinner-border spinner-border-md" role="status" aria-hidden="true"></span>');
      },
      done: function (data) {
        console.log("done");
        btnenviar.text("Archivos cargados");
      },
      complete: function (data) {
        console.log(data);
        if(data.status == 200){
          if (data.responseJSON.msj === "success") {
            ruta = data.responseJSON.ruta; 
            $('.modal-body').load('./?action=modal_explosion&ruta='+ruta , function () {         
              $('#modal_visualizar_datos').modal({ show: true });
            });
            btnenviar.text("Archivos cargados");
            btnenviar.removeAttr("disabled");
            $('#txt_subir_archivo_siigo').text('Archivo no ha sido cargado').removeClass(' text-sucess').addClass('text-danger');
          } else if(data.responseJSON.code === "300"){
            alert("\nError: 300 " + ' \nMensaje ' + data.responseJSON.msj);
            btnenviar.text("Subir archivos");
            btnenviar.removeAttr("disabled");
            $('#txt_subir_archivo_siigo').text('Archivo no ha sido cargado').removeClass(' text-sucess').addClass('text-danger');

          } 
        } else {
          alert("\nError: " + data.status + ' \nMensaje: Error al procesar el archivo de excel. Archivo corrupto , celdas en blancos en la hoja de excel o falta de permisos en el servidor'
           + '\nestado: ' + data.statusText);
           btnenviar.text("Subir archivos");
           btnenviar.removeAttr("disabled");
           $('#txt_subir_archivo_siigo').text('Archivo no ha sido cargado').removeClass(' text-sucess').addClass('text-danger');
        }
      },
      fail: function (jqXHR, textStatus, errorThrown) {
        alert("\nError: " + jqXHR.status + ' \nMensaje ' + textStatus + ' \nestado ' + errorThrown);
      },
    });
  return false;
});


$(document).on('submit', '#frmGenerarExplosion', function () {
  var btnenviarE = $("#btnGenerarExplosion");
    var data = new FormData(this);
    $.ajax({
      type: $(this).attr("method"),
      url: $(this).attr("action"),
      processData: false,
      contentType: false,
      cache: false,
      dataType: "json",
      data: data,
      beforeSend: function () {
        btnenviarE.text("Generando archivo ");
        btnenviarE.attr("disabled", "disabled");
        $(".modal-footer").on("#btnGenerarExplosion").append('<span id="spinner-generar-explosion" class="spinner-border spinner-border-md" role="status" aria-hidden="true"></span>');
      },
      done: function (data) {
        btnenviarE.text("Archivos generados");
      },
      complete: function (data) {
        console.log(data);
        if(data.status == 200  ){
          if(data.responseJSON.status==200){  
            btnenviarE.text("Archivos generados");
            if (data.responseJSON.msj === "success") {
              ruta = data.responseJSON.ruta; 
              btnenviarE.text("Archivos generados");
              location.href = ruta;
              limpiarCache(ruta);
              setTimeout(function () {
                $("#modal_visualizar_datos").modal('hide');
              }, 1000);
            } else {
              btnenviarE.text("Archivos no generados");
               limpiarCache(ruta);
              setTimeout(function () {
                $("#modal_visualizar_datos").modal('hide');
              }, 1000);
            }
          } if(data.responseJSON.status==202){
            //  limpiarCache(ruta);
            alert("\nError: " + data.responseJSON.status + ' \nMensaje:'+ data.responseJSON.descripcion+ '\nestado: ' + data.msj);
            setTimeout(function () {
              $("#modal_visualizar_datos").modal('hide');
            }, 1000);
          }
        }else {
            alert("\nError: " + data.status + ' \nMensaje: Ha ocurrido un problema con el servidor'+ '\nestado: ' + data.statusText);
          }
      },
      fail: function (jqXHR, textStatus, errorThrown) {
        alert("\nError: " + jqXHR.status + ' \nMensaje ' + textStatus + ' \nestado ' + errorThrown);
      },
    });
  return false;
});

$(document).on("click","#btn_cruzar_auto", function () {
  $.ajax({
    type: 'POST',
    url: './?action=add_cruzar_auto' ,
    dataType: 'JSON',
    beforeSend: function () {
      cargarBarra();    
    },
    success: function (data) {
    },
    complete: function (data) {      
      setTimeout(function () {
        $("#modal_cruzar").modal('hide');
      }, 3000);  
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert("\nError: " + jqXHR.status + ' \nMensaje: ' + textStatus + ' \nestado ' + errorThrown);
    },
  });
  return false;
});


$(function () {
  $(".subir_archivo").change(function () {
    if (this.files.length !== 0) {
      $('#txt_subir_archivo_siigo').text('Archivo cargado correctamente').removeClass(' text-danger').addClass('text-success');
    } else {
      $('#txt_subir_archivo_siigo').text('Archivo no ha sido cargado');
    }
  });
});

let limpiarCache=(ruta) => {
  $.ajax({  
    type: 'POST',
    url:  './?action=limpiar_cache',
    data: {ruta : ruta},
    beforeSend: function () {
      console.log("Before");
    },
    done: function () {
      console.log("Done");
    },
    complete: function (data) {
      console.log(data.responseJSON);
    },
    fail: function (jqXHR, textStatus, errorThrown) {
      alert("\nError: " + jqXHR.status + ' \nMensaje ' + textStatus + ' \nestado ' + errorThrown);
    },
  });
return false;

}

$(function () {
  $(".btn_eliminar_producto").dblclick(function () {
    var id = $(this).data("id");
    var opcion = confirm("¿Desea eliminar el elemento?");
    if (opcion == true) {
    $.get("./?action=delete_catalogo&id=" + id, function () {
      alert("Se ha eliminado el producto del catalogo");
      window.location = "./?view=catalogo";
    });
  } 
  });
});

$(function () {
  $("#btn_subir_catalogo").on("click", function () {
    $("#btn_subir_catalogo").text("Subiendo archivo");
    $("#btn_subir_catalogo").attr("disabled", true);
    $(document).ready(function () {
      $("#btn_subir_catalogo").text("Proceso terminado");
      $("#btn_subir_catalogo").attr("disabled", "disabled");
    });
  });
});

$("#elemento").keydown(function (e) {
  if (e.which == 13 || e.which == 9) {
    e.preventDefault();
    let grupo = $('#idGrupo option:selected').text();
    let elemento = $('#elemento').val();
    let linea = $('#idLinea option:selected').text();
    let res = `${linea}${grupo}${elemento}`
    res = res.replace(/\D/g, '');
    $('#codigo_siigo').val(res);
  }
});
$(function () {
      $(".btn_cambiar_password").dblclick(function () {
       var id = $(this).data("id");
         $.get("./?action=change_password&id=" + id, function () {
              alert("Se ha reestablecido la contraseña")
        });
      });
  });
$(function () {
  $(".btn_eliminar_grupo").dblclick(function () {
    var id = $(this).data("id");
    var opcion = confirm("¿Desea eliminar el elemento?");
    if (opcion == true) {
      $.get("./?action=delete_grupo&id=" + id, function () {
        alert("Se ha eliminado el grupo seleccionado");
        window.location = "./?view=grupo";
      });
	} 
  });
});



$(function () {
  $(".btn_eliminar_linea").dblclick(function () {
    var id = $(this).data("id");
    var opcion = confirm("¿Desea eliminar el elemento?");
    if (opcion == true) {
    $.get("./?action=delete_linea&id=" + id, function () {
      alert("Se ha eliminado la linea seleccionada");
      window.location = "./?view=linea";
    });
  }
  });
});

$(function () {
  $(".btn_eliminar_producto").dblclick(function () {
    var id = $(this).data("id");
    var opcion = confirm("¿Desea eliminar el elemento?");
    if (opcion == true) {
    $.get("./?action=delete_catalogo&id=" + id, function () {
      alert("Se ha eliminado el producto del catalogo");
      window.location = "./?view=catalogo";
    });
  }
  });
});

$(function () {
  $(".btn_eliminar_inventario").dblclick(function () {
    var id = $(this).data("id");
    var opcion = confirm("¿Desea eliminar el elemento?");
    if (opcion == true) {
    $.get("./?action=delete_inventario&id=" + id, function () {
      alert("Se ha eliminado un item en la parametrizacion de inventarios");
      window.location = "./?view=linea_inventario";
    });
  }
  });
});

$(function () {
  $(".btn_eliminar_subproducto").dblclick(function () {
    var id = $(this).data("id");
    var opcion = confirm("¿Desea eliminar el elemento?");
    if (opcion == true) {
    $.get("./?action=delete_subproducto&id=" + id, function () {
      alert("Se ha eliminado un item en la parametrizacion de subproductos");
      window.location = "./?view=subproductos";
    });
  }
  });
});


$(document).on("click",".btn_eliminar_relacion",function () {
    var id = $(this).data("id");
    var opcion = confirm("¿Desea eliminar el elemento?");
    if (opcion == true) {
    $.get("./?action=delete_relacion_subproducto&id=" + id, function () {
      alert("Se ha eliminado la relacion seleccionada");
      window.location = "./?view=subproducto";
    });
  }});


//Abrir modal linea
$(function () {
  $(".open_modal_linea").click(function () {
    var id = $(this).data("id");
    $(".modal-body").load("./?action=modal_linea&id=" + id, function () {
      $("#modal_linea").modal({ show: true });
    });
  });
});

//Abrir modal grupo
$(function () {
  $(".open_modal_grupo").click(function () {
    var id = $(this).data("id");
    $(".modal-body").load("./?action=modal_grupo&id=" + id, function () {
      $("#modal_grupo").modal({ show: true });
    });
  });
});

//Abrir modal subproducto
$(function () {
  $(".open_modal_subproducto").click(function () {
    var id = $(this).data("id");
    $(".modal-body").load("./?action=modal_subproducto&id=" + id, function () {
      $("#modal_subproducto").modal({ show: true });
    });
  });
});

//Abrir modal relacionar
$(function () {
  $("#btn_relacionar").on("click",function () {
    $(".modal-body").load("./?action=modal_relacionar",function () {
      $("#modal_relacionar").modal({ show: true });
    });
  });
});

//Abrir modal cruzar informacion
$(function () {
  $("#btn_cruzar").on("click",function () {
    $(".modal-body").load("./?action=modal_cruzar",function () {
      $("#modal_cruzar").modal({ show: true });
    });
  });
});

//Abrir modal cruzar manual informacion
$(function () {
  $("#btn_cruzar_manual").on("click",function () {
    $(".modal-body").load("./?action=modal_cruzar_manual",function () {
      $("#modal_cruzar_manual").modal({ show: true });
    });
  });
});

//Abrir modal cruzar informacion
$(function () {
  $("#btn_cruzar_lista").on("click",function () {
    $(".modal-body").load("./?action=modal_cruzar_lista",function () {
      $("#modal_cruzar_lista").modal({ show: true });
    });
  });
});

//Abrir modal importar grupo
$(function () {
  $(".btn_importar_grupo").click(function () {
    $(".modal-body").load("./?action=modal_importar_grupo", function () {
      $("#modal_importar_grupo").modal({ show: true });
    });
  });
});

//Abrir modal importar linea
$(function () {
  $(".btn_importar_linea").click(function () {
    $(".modal-body").load("./?action=modal_importar_linea", function () {
      $("#modal_importar_linea").modal({ show: true });
    });
  });
});

//Abrir modal importar catalogo
$(function () {
  $(".btn_importar_catalogo").click(function () {
    $(".modal-body").load("./?action=modal_importar_catalogo", function () {
      $("#modal_importar_catalogo").modal({ show: true });
    });
  });
});

//Abrir modal importar catalogo
$(function () {
  $(".btn_importar_inventario").click(function () {
    $(".modal-body").load("./?action=modal_importar_inventario", function () {
      $("#modal_importar_inventario").modal({ show: true });
    });
  });
});

//Abrir modal importar catalogo
$(function () {
  $(".btn_importar_subproducto").click(function () {
    $(".modal-body").load("./?action=modal_importar_subproducto", function () {
      $("#modal_importar_subproducto").modal({ show: true });
    });
  });
});

$(window).on('load', function () {
  setTimeout(function () {
    $(".loader-content").css({ visibility: "hidden", opacity: "0" })
    $(".loader-page").css({ visibility: "hidden", opacity: "0" })
  }, 700);

});


let cargarBarra = () => {
   var current_progress = 0;
   var interval = setInterval(function() {
      current_progress += 10;
      $(".progress").on("#dynamic")
      .css("width", current_progress + "%")
      .attr("aria-valuenow", current_progress)
      .text(current_progress + "% Completado")
      .addClass("class=bg-info progress-bar progress-bar-striped active");
      if (current_progress >= 100)
          clearInterval(interval);
  }, 1300);
};

