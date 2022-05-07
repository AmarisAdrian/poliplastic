$(document).ready(function (mensaje) {

  var tabla_empleado = $('#tabla_empleado').DataTable({
    extend: 'collection',
    processing: true,
    'processing': true,
    buttons: [
      'csv',
      'excel',
      {
        extend: 'pdf',
      },
      {
        extend: 'print',
      }

    ],
  });
  tabla_empleado.buttons(0, null).containers().appendTo('#Menu_herramienta_empleado');

  var tabla_linea = $('#tabla_linea').DataTable({
    extend: 'collection',
    processing: true,
    'processing': true,
    buttons: [
      'csv',
      'excel',
      {
        extend: 'pdf',
      },
      {
        extend: 'print',
      }

    ],
  });
  tabla_linea.buttons(0, null).containers().appendTo('#Menu_herramienta_linea');

  var tabla_grupo = $('#tabla_grupo').DataTable({
    extend: 'collection',
    processing: true,
    'processing': true,
    buttons: [
      'csv',
      'excel',
      {
        extend: 'pdf',

      },
      {
        extend: 'print',
      }

    ],
  });
  tabla_grupo.buttons(0, null).containers().appendTo('#Menu_herramienta_grupo');

  var tabla_catalogo = $('#tabla_catalogo').DataTable({
    extend: 'collection',
    processing: true,
    'processing': true,
    buttons: [
      'csv',
      'excel',
      {
        extend: 'pdf',
      },
      {
        extend: 'print',
      }

    ],
  });
  tabla_catalogo.buttons(0, null).containers().appendTo('#Menu_herramienta_catalogo');

  var tabla_inventario = $('#tabla_inventario').DataTable({
    extend: 'collection',
    processing: true,
    'processing': true,
    buttons: [
      'csv',
      'excel',
      {
        extend: 'pdf',
      },
      {
        extend: 'print',
      }

    ],
  });
  tabla_inventario.buttons(0, null).containers().appendTo('#Menu_herramienta_inventario');

  var tabla_subproducto = $('#tabla_subproducto').DataTable({
    extend: 'collection',
    processing: true,
    'processing': true,
    buttons: [
      'csv',
      'excel',
      {
        extend: 'pdf',
      },
      {
        extend: 'print',
      }

    ],
  });
  tabla_subproducto.buttons(0, null).containers().appendTo('#Menu_herramienta_subproducto');


  var tabla_relacion_subproducto = $('#tabla_relacion_subproducto').DataTable({
    extend: 'collection',
    processing: true,
    'processing': true,
    buttons: [
      'csv',
      'excel',
      {
        extend: 'pdf',
      },
      {
        extend: 'print',
      }

    ],
  });
  tabla_relacion_subproducto.buttons(0, null).containers().appendTo('#Menu_herramienta_relacion_subproducto');

  var tabla_relacion_subproducto = $('#tabla_relacion_subproducto').DataTable({
    extend: 'collection',
    processing: true,
    'processing': true,
    buttons: [
      'csv',
      'excel',
      {
        extend: 'pdf',
      },
      {
        extend: 'print',
      }

    ],
  });
  tabla_relacion_subproducto.buttons(0, null).containers().appendTo('#Menu_herramienta_relacion_subproducto');

});


