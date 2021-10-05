"use strict";
window.addEventListener("load", () => {
  const formbuscar = document.getElementById("formbuscar");
  const buscar = document.getElementById("buscar");
  const alerta = document.getElementById("tbody");
  const mensaje = document.getElementById("mensaje");
  const selectAtendido = document.getElementById("selectAtendido");

  const template = document.querySelector("#template-table-atendido").content;
  const fragment = document.createDocumentFragment();
  const mostrarAtendido = () => {
    fetch("./controllers/controlador_atendido.php")
      .then((res) => res.json())
      .then((data) => {
        if (data.error) {
          mensaje.innerHTML = `
            <div class="alert alert-danger" role="alert">
            Llena el campo buscar
            </div>`;
          alerta.innerHTML = ``;
        } else {
          getUltimosAtendidos(data);
          $(document).ready(function () {
            // creamos la tabla
            var table = $("#listingTable").DataTable({
              initComplete: function () {
                this.api()
                  .columns()
                  .every(function () {
                    var column = this;
                    var select = $(
                      '<select><option value=""></option></select>'
                    )
                      .appendTo($(column.footer()).empty())
                      .on("change", function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                          $(this).val()
                        );

                        column
                          .search(val ? "^" + val + "$" : "", true, false)
                          .draw();
                      });

                    column
                      .data()
                      .unique()
                      .sort()
                      .each(function (d, j) {
                        select.append(
                          '<option value="' + d + '">' + d + "</option>"
                        );
                      });
                  });
              },
              data: data,
              dom: "Plfrtip",
              columns: [
                { data: "idsolicitud" },
                { data: "pac" },
                { data: "fecha" },
                { data: "nombres" },
                {
                  data: null,
                  className: "dt-center editor-delete",
                  render: function (data) {
                    let estado = data.estado;
                    if (estado == 1) {
                      estado = 0;
                      return `<a class="btn btn-primary" href="index.php?vista=atendidos&id=${data.idproducto}&esta=${estado}&operacion=estado">atendido</a>`;
                    } else if (estado == 0) {
                      estado = 1;
                      return `<a class="btn btn-primary" href="index.php?vista=atendidos&id=${data.idproducto}&esta=${estado}&operacion=estado">No atendido</a>`;
                    }
                  },
                  // orderable: false
                },
              ],
              language: {
                url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json",
              },
              lengthMenu: [
                [5, 10, 20, 25, 50, -1],
                [5, 10, 20, 25, 50, "Todos"],
              ],
            });
          });
        }
      });
  };
  mostrarAtendido();

  //filtrar ultimos atendidos
  const containerCard = document.querySelector(".container__atendidos__cards");
  const template2 = document.getElementById("card").content;
  const fragment2 = document.createDocumentFragment();
  const getUltimosAtendidos = (data) => {
    const atendidos = data.filter((dat) => dat.estado == "1");
    const ordenFechas = atendidos.sort((a, b) => {
      if (a.fecha > b.fecha) {
        return 1;
      }
      if (a.fecha < b.fecha) {
        return -1;
      }
      return 0;
    });
    const ultimosTres = ordenFechas.slice(ordenFechas.length - 3);
    ultimosTres.forEach((el) => {
      template2.querySelector(".card__atendido h3").textContent = el.nombres;
      template2.querySelector(".card__atendido h4").textContent = el.fecha;
      const clone = template2.cloneNode(true);
      fragment2.appendChild(clone);
    });
    containerCard.appendChild(fragment2);
  };

  //atendidos
  const mostrarAtendido2 = () => {
    fetch("./controllers/controlador_atendido.php")
      .then((res) => res.json())
      .then((data) => {
        if (data.error) {
          mensaje.innerHTML = `
            <div class="alert alert-danger" role="alert">
            Llena el campo buscar
            </div>`;
          alerta.innerHTML = ``;
        } else {
          const atendidos = data.filter((dat) => dat.estado == "1");
          $(document).ready(function () {
            // creamos la tabla
            var table = $("#atendidos").DataTable({
              initComplete: function () {
                this.api()
                  .columns()
                  .every(function () {
                    var column = this;
                    var select = $(
                      '<select><option value=""></option></select>'
                    )
                      .appendTo($(column.footer()).empty())
                      .on("change", function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                          $(this).val()
                        );

                        column
                          .search(val ? "^" + val + "$" : "", true, false)
                          .draw();
                      });

                    column
                      .data()
                      .unique()
                      .sort()
                      .each(function (d, j) {
                        select.append(
                          '<option value="' + d + '">' + d + "</option>"
                        );
                      });
                  });
              },
              data: atendidos,
              dom: "Plfrtip",
              columns: [
                { data: "idsolicitud" },
                { data: "pac" },
                { data: "fecha" },
                { data: "nombres" },
                {
                  data: null,
                  className: "dt-center editor-delete",
                  render: function (data) {
                    let estado = data.estado;
                    if (estado == 1) {
                      estado = 0;
                      return `<a class="btn btn-primary" href="index.php?vista=pedidos&id=${data.idproducto}&esta=${estado}&operacion=estado">atendido</a>`;
                    } else if (estado == 0) {
                      estado = 1;
                      return `<a class="btn btn-primary" href="index.php?vista=pedidos&id=${data.idproducto}&esta=${estado}&operacion=estado">No atendido</a>`;
                    }
                  },
                },
              ],
              language: {
                url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json",
              },
              lengthMenu: [
                [5, 10, 20, 25, 50, -1],
                [5, 10, 20, 25, 50, "Todos"],
              ],
            });
          });
        }
      });
  };
  mostrarAtendido2();

  //no atendidos

  const NoAtendidos = () => {
    fetch("./controllers/controlador_atendido.php")
      .then((res) => res.json())
      .then((data) => {
        if (data.error) {
          mensaje.innerHTML = `
            <div class="alert alert-danger" role="alert">
            Llena el campo buscar
            </div>`;
          alerta.innerHTML = ``;
        } else {
          const noatendidos = data.filter((dat) => dat.estado == "0");
          $(document).ready(function () {
            // creamos la tabla
            var table = $("#noatendidos").DataTable({
              initComplete: function () {
                this.api()
                  .columns()
                  .every(function () {
                    var column = this;
                    var select = $(
                      '<select><option value=""></option></select>'
                    )
                      .appendTo($(column.footer()).empty())
                      .on("change", function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                          $(this).val()
                        );

                        column
                          .search(val ? "^" + val + "$" : "", true, false)
                          .draw();
                      });

                    column
                      .data()
                      .unique()
                      .sort()
                      .each(function (d, j) {
                        select.append(
                          '<option value="' + d + '">' + d + "</option>"
                        );
                      });
                  });
              },
              data: noatendidos,
              dom: "Plfrtip",
              columns: [
                { data: "idsolicitud" },
                { data: "pac" },
                { data: "fecha" },
                { data: "nombres" },
                {
                  data: null,
                  className: "dt-center editor-delete",
                  render: function (data) {
                    let estado = data.estado;
                    if (estado == 1) {
                      estado = 0;
                      return `<a class="btn btn-primary" href="index.php?vista=atendidos2&id=${data.idproducto}&esta=${estado}&operacion=estado">atendido</a>`;
                    } else if (estado == 0) {
                      estado = 1;
                      return `<a class="btn btn-primary" href="index.php?vista=atendidos2&id=${data.idproducto}&esta=${estado}&operacion=estado">No atendido</a>`;
                    }
                  },
                },
              ],
              language: {
                url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json",
              },
              lengthMenu: [
                [5, 10, 20, 25, 50, -1],
                [5, 10, 20, 25, 50, "Todos"],
              ],
            });
          });
        }
      });
  };
  NoAtendidos();
});
