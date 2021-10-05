const mostrarProducto = () => {
  fetch("./controllers/controlador_busquedaproducto.php")
    .then((res) => res.json())
    .then((data) => {
      if (data.error) {
        console.log(data.error);
      } else {
        $(document).ready(function () {
          // creamos la tabla
          $("#table_productos").DataTable({
            columns: [
              { data: "id" },
              { data: "pac" },
              { data: "estado" },
              {
                data: null,
                className: "dt-center editor-delete",
                render: function (data, type, row) {
                  return `<form action="index.php?vista=dispositivo&id=${data["idproducto"]}&operacion=editar"
                    method="POST">
                      <td class="content__btn">
                          <input type="submit" name="Editar" value="Editar" class="btn btn-primary btn-sm">
                      </td>
                    </form>`;
                },
                orderable: false,
              },
              {
                data: null,
                className: "dt-center editor-delete",
                render: function (data, type, row) {
                  return `<form action="index.php?vista=dispositivo&id=${data["idproducto"]}&operacion=eliminar"
                      method="POST">
                      <td class="content__btn">
                          <input type="submit" name="Eliminar" value="Eliminar" class="btn btn-secondary btn-sm">
                      </td>
                    </form>`;
                },
                orderable: false,
              },
            ],
            data: data,
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

mostrarProducto();
