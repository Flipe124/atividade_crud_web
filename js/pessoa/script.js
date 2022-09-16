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

  // BOTÃO "EDITAR" PESSOA
  $(".btn-editar-pessoa").on("click", function () {
    $(".btn-editar-pessoa").attr({ disabled: true });

    $("#modal-editar-pessoa").modal("show");

    $(".error").hide();

    $("#form-editar-pessoa")[0].reset();

    $("#form-editar-pessoa input").attr({ disabled: false });
    $("#form-editar-pessoar select").attr({ disabled: false });
    $("#form-editar-pessoa button[type=submit]").show();

    let id = $(this).data("id");

    $.ajax({
      url: "../process/pessoa/get.php",
      method: "GET",
      dataType: "json",
      data: { id },
      success: function (response) {
        let { error, pessoa } = response;

        $(".btn-editar-pessoa").attr({ disabled: false });

        if (error.length > 0) {
          $("#form-editar-pessoainput").attr({ disabled: true });
          $("#form-editar-pessoa select").attr({ disabled: true });
          $("#form-editar-pessoa button[type=submit]").hide();

          for (let i = 0; i < error.length; i++) {
            $(`.error-${error[i].field}`).text(error[i].msg);
            $(`.error-${error[i].field}`).show();
          }
        } else {
          $("#form-editar-pessoa #id").val(pessoa.id);
          $("#form-editar-pessoa #nome").val(pessoa.nome);
          $("#form-editar-pessoa #tipo").val(pessoa.tipo);
          $("#form-editar-pessoa #sexo").val(pessoa.sexo);
          $("#form-editar-pessoa #doc").val(pessoa.doc);
          $("#form-editar-pessoa #cep").val(pessoa.cep);
          $("#form-editar-pessoa #endereco").val(pessoa.endereco);
          $("#form-editar-pessoa #numero").val(pessoa.numero);
          $("#form-editar-pessoa #bairro").val(pessoa.bairro);
          $("#form-editar-pessoa #complemento").val(pessoa.complemento);
          $("#form-editar-pessoa #cidade").val(pessoa.cidade);
          $("#form-editar-pessoa #uf").val(pessoa.uf);
        }
      },
      error: function (response) {
        $(".btn-editar-pessoa").attr({ disabled: false });
      },
    });
  });

  // BOTÂO ALTERAR USUÀRIO
  $("#form-editar-pessoa").on("submit", function (event) {
    event.preventDefault(); // CANCELA O RECARREGAMENTO DA PÁGINA

    $(".error").hide();

    let form = $("#form-editar-pessoa")[0];

    $("#form-editar-pessoa button[type=submit]").attr({ disabled: true });
    $("#form-editar-pessoa button[type=submit]").text("CARREGANDO...");

    $.ajax({
      url: "../process/pessoa/update.php",
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

          $("#form-editar-pessoa button[type=submit]").attr({ disabled: false });
          $("#form-editar-pessoa button[type=submit]").text("SALVAR");
        } else {
          location.replace(
            `?message=success&action=update&name=${form.name.value}`
          );
        }
      },
      error: function (response) {
        $("#form-editar-pessoa button[type=submit]").attr({ disabled: false });
        $("#form-editar-pessoa button[type=submit]").text("SALVAR");
        console.log(response);
      },
    });
  });
});
