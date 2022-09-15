<?php include_once('../includes/header.php') ?>
<?php include_once('../includes/navbar.php') ?>

<?php
    $sql = ("SELECT * FROM `pessoa` WHERE 1 = 1");

    $pessoa = $connection->connection()->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    ?>

<div class="container" id="container-principal">
    <div class="row">
        <div class="col-md-6 mt-3">
            <h1>Pessoas</h1>
        </div>
        <div class="col-md-6 mt-4 text-end">
            <button class="btn btn-success" id="btn-cadastrar" type="button"><i class="fa-sharp fa-solid fa-user-plus"></i> CADASTRAR</button>
        </div>
        <div class="col-md-12">
            <hr>
        </div>

    </div>
</div>

<?php include_once('../includes/footer.php') ?>