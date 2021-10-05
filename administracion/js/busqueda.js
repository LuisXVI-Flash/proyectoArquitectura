$(buscar_datos());

function buscar_datos(verificador, consulta) {
  $.ajax({
    url: "./controllers/controlador_dispositivo.php",
    type: "POST",
    dataType: "html",
    data: { verificador: verificador, consulta: consulta },
  })
    .done(function (respuesta) {
      $("#datos").html(respuesta);
      console.log(respuesta);
    })
    .fail(function () {
      console.log("error");
    })
    .always(function () {
      console.log(consulta);
      console.log(verificador);
    });
}
$(document).on("keyup", "#buscar", function () {
  var valor = $(this).val();
  if (valor != "") {
    buscar_datos("1", valor);
  } else {
    buscar_datos("1");
  }
});
$(document).ready(function () {
  buscar_datos("1");
});
