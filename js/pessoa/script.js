$(document).ready(function () {
  // BOTÃO "CADASTRAR"
  $("#btn-cadastrar").on("click", function () {
    $(".error").hide();

    $("#form-cadastrar-pessoa")[0].reset();

    $("#modal-cadastrar-pessoa").modal("show");
  });

  // BOTÂO "CADASTAR" DENTRO DO MODAL "CADASTRAR"
  $("#form-cadastrar-pessoa").on("submit", function (event) {
    event.preventDefault();

    $(".error").hide();

    let form = $("#form-cadastrar-pessoa")[0];

    $("#form-cadastrar-pessoar button[type=submit]").attr({ disabled: true });
    $("#form-cadastrar-pessoa button[type=submit]").text("CARREGANDO...");

    $.ajax({
      url: "../process/pessoa/create.php",
      processData: false,
      dataTypeIn: "plain",
      contentType: false,
      method: "POST",
      dataType: "json",
      data: new FormData(form),
      success: function (response) {
        let { error } = response;

        if (error.length > 0) {
          for (let i = 0; i < error.length; i++) {
            $(`.error-${error[i].field}`).text(error[i].msg);
            $(`.error-${error[i].field}`).show();
          }

          $("#form-cadastrar-pessoa button[type=submit]").attr({
            disabled: false,
          });
          $("#form-cadastrar-pessoa button[type=submit]").text("SALVAR");
        } else {
          location.replace(
            `?message=success&action=create&name=${form.name.value}`
          );
        }
      },
      error: function (response) {
        $("#form-cadastrar-pessoa button[type=submit]").attr({
          disabled: false,
        });
        $("#form-cadastrar-pessoa button[type=submit]").text("SALVAR");
        console.log(response);
      },
    });
  });

  // BOTÃO "EXCLUIR" DENTRO DO MODAL EXCLUIR
  $(".btn-confirmar-excluir").on("click", function () {
    $(".error").hide();

    let id = $(this).data("id");

    $(".btn-confirmar-excluir").attr({ disabled: true });
    $(".btn-confirmar-excluir").text("EXCLUINDO...");

    $.ajax({
      url: "../process/pessoa/delete.php",
      method: "POST",
      dataType: "json",
      data: { id },
      success: function (response) {
        let { error } = response;

        if (error.length > 0) {
          for (let i = 0; i < error.length; i++) {
            $(`.error-${error[i].field}`).text(error[i].msg);
            $(`.error-${error[i].field}`).show();
          }

          $(".btn-confirmar-excluir").attr({ disabled: false });
          $(".btn-confirmar-excluir").text("EXCLUIR");
        } else {
          location.replace(`?message=success&action=delete`);
        }
      },
      error: function (response) {
        $(".btn-confirmar-excluir").attr({ disabled: false });
        $(".btn-confirmar-excluir").text("EXCLUIR");
        console.log(response);
      },
    });
  });
});
