$(document).ready(function () {
  function loadCars(searchQuery = "") {
    $.get("index.php", { search_query: searchQuery }, function (response) {
      let tableContent = $(response).find("#carsTableBody").html();
      $("#carsTableBody").html(tableContent);
    });
  }

  $("#searchForm").submit(function (event) {
    event.preventDefault();
    let searchQuery = $("#searchQuery").val().trim();
    loadCars(searchQuery);
  });

  $("#resetSearch").click(function () {
    $("#searchQuery").val("");
    loadCars();
  });

  loadCars();
});

$(document).ready(function () {
  $("#openCreateModal").click(function () {
    $("#createCarForm")[0].reset();
    $("#createCarModal").modal("show");
  });

  $("#createCarForm").submit(function (event) {
    event.preventDefault();

    $.post("./api/create_post.php", $(this).serialize(), function (response) {
      Swal.fire({
        icon: "success",
        title: "¡Auto agregado!",
        text: "El auto se ha agregado correctamente.",
        confirmButtonColor: "#28a745",
      }).then(() => {
        $("#createCarModal").modal("hide");
        location.reload();
      });
    }).fail(function () {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "No se pudo agregar el auto. Inténtalo de nuevo.",
        confirmButtonColor: "#d33",
      });
    });
  });

  $("#editCarForm").submit(function (event) {
    event.preventDefault();

    $.post("./api/modify_update.php", $(this).serialize(), function (response) {
      Swal.fire({
        icon: "success",
        title: "¡Auto actualizado!",
        text: "Los datos del auto han sido actualizados correctamente.",
        confirmButtonColor: "#28a745",
      }).then(() => {
        $("#editCarModal").modal("hide");
        location.reload();
      });
    }).fail(function () {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "No se pudo actualizar el auto. Inténtalo de nuevo.",
        confirmButtonColor: "#d33",
      });
    });
  });
});

function openEditModal(id, serial_num, mark, year, cost, category, mileage) {
  $("#edit_car_id").val(id);
  $("#edit_serial_num").val(serial_num);
  $("#edit_mark").val(mark);
  $("#edit_year").val(year);
  $("#edit_cost").val(cost);
  $("#edit_category").val(category);
  $("#edit_mileage").val(mileage);

  $("#editCarModal").modal("show");
}

function deleteCar(carId) {
  Swal.fire({
    title: "¿Estás seguro?",
    text: "No podrás revertir esta acción.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Sí, eliminarlo",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "./api/remove_car.php",
        type: "POST",
        data: { id: carId },
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            Swal.fire({
              icon: "success",
              title: "¡Eliminado!",
              text: "El auto ha sido eliminado correctamente.",
              confirmButtonColor: "#28a745",
            }).then(() => {
              location.reload();
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: "No se pudo eliminar el auto. Inténtalo de nuevo.",
              confirmButtonColor: "#d33",
            });
          }
        },
        error: function () {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Ocurrió un problema al eliminar el auto.",
            confirmButtonColor: "#d33",
          });
        },
      });
    }
  });
}
