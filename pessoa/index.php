<?php include_once('../includes/header.php') ?>
<?php include_once('../includes/navbar.php') ?>

<?php
$sql = ("SELECT * FROM `pessoa` WHERE 1 = 1");

$pessoas = $connection->connection()->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container" id="container-principal">
    <div class="row">
        <div class="col-md-6 mt-3">
            <h1>Pessoas</h1>
        </div>
        <div class="col-md-6 mt-4 text-end">
            <button class="btn btn-success" id="btn-cadastrar" type="button"><i class="fa-sharp fa-solid fa-user-plus"></i> CADASTRAR</button>
        </div>
        <div class="modal" id="modal-cadastrar-pessoa" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h3 class="modal-title text-light">Cadastrar</h3>
                        <button type="button" class="btn-close bg-light me-2" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form-cadastrar-pessoa" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="error error-execute"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nome: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="nome" maxlength="100" placeholder="Informe o nome" autofocus>
                                    <span class="error error-nome"></span>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">tipo: <span class="text-danger">*</span></label>
                                    <select class="form-select" name="tipo">
                                        <option value="1">Pessoa Fisíca</option>
                                        <option value="2">Pessoa Juridica</option>
                                    </select>
                                    <span class="error error-tipo"></span>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Sexo: <span class="text-danger">*</span></label>
                                    <select class="form-select" name="sexo">
                                        <option value="M">Masculino</option>
                                        <option value="F">Feminino</option>
                                    </select>
                                    <span class="error error-sexo"></span>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="form-label">CPF/CNPJ: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="doc" maxlength="20" placeholder="Informe o documento">
                                    <span class="error error-doc"></span>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="form-label">Cidade: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="cidade" maxlength="20" placeholder="Informe a cidade">
                                    <span class="error error-cidade"></span>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="form-label">CEP: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="cep" maxlength="20" placeholder="Informe o CEP">
                                    <span class="error error-cep"></span>
                                </div>
                                <div class="col-md-5 mt-3">
                                    <label class="form-label">Endereço: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="endereco" maxlength="20" placeholder="Informe o endereço">
                                    <span class="error error-endereco"></span>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label class="form-label">Número: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="numero" maxlength="10" placeholder="Informe o número">
                                    <span class="error error-numero"></span>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="form-label">Bairro: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="bairro" maxlength="20" placeholder="Informe o bairro">
                                    <span class="error error-bairro"></span>
                                </div>
                                <div class="col-md-8 mt-3">
                                    <label class="form-label">Complemento:</label>
                                    <input class="form-control" type="text" name="complemento" maxlength="20" placeholder="Informe o complemento">
                                    <span class="error error-complemento"></span>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label class="form-label">UF: <span class="text-danger">*</span></label>
                                    <select class="form-select" name="uf">
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                    </select>
                                    <span class="error error-uf"></span>
                                </div>

                            </div>
                            <hr>
                            <div class="mt-4 text-end">
                                <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">CANCELAR</button>
                                <button class="btn btn-success" id="btn-submit-cadastrar" type="submit"><i class="fa-sharp fa-solid fa-user-plus"></i> CADASTRAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
        <div class="col-md-12">
            <table class="table table-light table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Sexo</th>
                        <th>CPF/CNPJ</th>
                        <th>Cidade</th>
                        <th>CEP</th>
                        <th>Endereço</th>
                        <th>Número</th>
                        <th>Bairro</th>
                        <th>Complemento</th>
                        <th>UF</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pessoas as $pessoa) { ?>
                        <tr>
                            <td>
                                <?php echo $pessoa['nome'] ?>
                            </td>
                            <td>
                                <?php echo $pessoa['tipo'] ?>
                            </td>
                            <td>
                                <?php echo $pessoa['sexo'] ?>
                            </td>
                            <td>
                                <?php echo $pessoa['doc'] ?>
                            </td>
                            <td>
                                <?php echo $pessoa['cidade'] ?>
                            </td>
                            <td>
                                <?php echo $pessoa['cep'] ?>
                            </td>
                            <td>
                                <?php echo $pessoa['endereco'] ?>
                            </td>
                            <td>
                                <?php echo $pessoa['numero'] ?>
                            </td>
                            <td>
                                <?php echo $pessoa['bairro'] ?>
                            </td>
                            <td>
                                <?php echo $pessoa['complemento'] ?>
                            </td>
                            <td>
                                <?php echo $pessoa['uf'] ?>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-excluir-pessoa" type="button" data-bs-toggle="modal" data-bs-target="#modal-excluir-pessoa<?php echo $pessoa["id"] ?>">
                                    <i class="fa-solid fa-trash-can"></i> EXCLUIR
                                </button>
                                <div class="modal fade" id="modal-excluir-pessoa<?php echo $pessoa["id"] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger text-light">
                                                <h4 class="modal-title" id="modal-updateLabel">Excluir</h4>
                                                <button class="btn-close bg-light me-2" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-md-12">
                                                    <label class="form-label">Tem certeza que deseja exluir <b><?php echo $pessoa["nome"] ?></b>?</label>
                                                </div>
                                                <hr>
                                                <div class="mt-4 text-end">
                                                    <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">CANCELAR</button>
                                                    <button class="btn btn-danger btn-confirmar-excluir" type="submit" data-id="<?php echo $pessoa['id']; ?>">
                                                        <i class="fa-solid fa-trash-can"></i> EXCLUIR
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-editar-pessoa" data-id="<?php echo $pessoa['id']; ?>">
                                    <i class="fa-sharp fa-solid fa-pen"></i> EDITAR
                                </button>


                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- MODAL EDITAR PESSOA -->
<div class="modal" id="modal-editar-pessoa" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 class="modal-title text-light">Editar</h3>
                <button type="button" class="btn-close bg-light me-2" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-editar-pessoa" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="error error-execute"></span>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nome: <span class="text-danger">*</span></label>
                            <input class="form-control" id="nome" type="text" name="nome" maxlength="100" placeholder="Informe o nome" autofocus>
                            <span class="error error-nome"></span>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">tipo: <span class="text-danger">*</span></label>
                            <select class="form-select" name="tipo">
                                <option value="1">Pessoa Fisíca</option>
                                <option value="2">Pessoa Juridica</option>
                            </select>
                            <span class="error error-tipo"></span>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Sexo: <span class="text-danger">*</span></label>
                            <select class="form-select" name="sexo">
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                            <span class="error error-sexo"></span>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-label">CPF/CNPJ: <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="doc" maxlength="20" placeholder="Informe o documento">
                            <span class="error error-doc"></span>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-label">Cidade: <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="cidade" maxlength="20" placeholder="Informe a cidade">
                            <span class="error error-cidade"></span>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-label">CEP: <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="cep" maxlength="20" placeholder="Informe o CEP">
                            <span class="error error-cep"></span>
                        </div>
                        <div class="col-md-5 mt-3">
                            <label class="form-label">Endereço: <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="endereco" maxlength="20" placeholder="Informe o endereço">
                            <span class="error error-endereco"></span>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Número: <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="numero" maxlength="10" placeholder="Informe o número">
                            <span class="error error-numero"></span>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-label">Bairro: <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="bairro" maxlength="20" placeholder="Informe o bairro">
                            <span class="error error-bairro"></span>
                        </div>
                        <div class="col-md-8 mt-3">
                            <label class="form-label">Complemento:</label>
                            <input class="form-control" type="text" name="complemento" maxlength="20" placeholder="Informe o complemento">
                            <span class="error error-complemento"></span>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-label">UF: <span class="text-danger">*</span></label>
                            <select class="form-select" name="uf">
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                            </select>
                            <span class="error error-uf"></span>
                        </div>

                    </div>
                    <hr>
                    <div class="mt-4 text-end">
                        <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">CANCELAR</button>
                        <button class="btn btn-primary" id="btn-submit-cadastrar" type="submit"><i class="fa-sharp fa-solid fa-pen"></i> EDITAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include_once('../includes/footer.php') ?>