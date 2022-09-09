<?php
session_start();
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Cadastrar</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('mensagem.php'); ?>

        <div class="row">
            <div class="col-md-12">
                 <div>
                    <div>
                        <h5>Inclusão/Edição de Clientes/Contatos
                          
                        </h5>
                    </div>
                        <div >
                        <form class="card-header" style="background-color:#c9c9c9" action="code.php" method="POST">
                            
                            <div class="mb-3">
                                <label class="col-sm-1 col-form-label">Cód. Cliente</label>
                                <input size="10" type="text" disabled="disabled" class="form-inline">
                            </div>

                            
                            <div class="mb-3">
                                <label class="col-sm-1 col-form-label">Razão Social</label>
                                <input size="70" type="text"  maxlength=60  name="razao_social" required class="form-inline">
                            </div>
                            <div class="mb-3">
                                <label class="col-sm-1 col-form-label">Nome Fantasia</label>
                                <input size="80" type="text"   maxlength=60  name="nome_fantasia" required    class="form-inline">
                            </div>
                            <div class="mb-3">
                                <label class="col-sm-1 col-form-label">Endereço</label>
                                <input size="80" type="text"  maxlength=60     name="endereco" class="form-inline">
                            </div>
                            <div class="mb-3">
                                <label class="col-sm-1 col-form-label">Complemento</label>
                                <input  size="80" type="text" maxlength=60   name="complemento" class="form-inline">
                            </div>
                            <div class="mb-3">
                                <label class="col-sm-1 col-form-label">Bairro</label>
                                <input type="text" size="80" maxlength=60   name="bairro" class="form-inline">
                            </div>
                            <div class="mb-3">
                                <label class="col-sm-1 col-form-label">Cidade</label>
                                <input size="50" type="text" maxlength=45  name="cidade" class="form-inline">
                            </div>
                            <div class="mb-3">
                                <label class="col-sm-1 col-form-label">Estado</label>
                                <input size="2" type="text"   maxlength=2  name="estado" class="form-inline">
                            </div>
                            <div class="mb-3">
                                <label class="col-sm-1 col-form-label">Data inclusão</label>
                              <input type="date"   name="data_inclusao" value="<?php echo date("Y-m-d");?>">
                            </div>

                            <div class="card-header" style="text-align:center">
                                <button type="submit" name="salvar" class="btn btn-light" >Gravar</button>
                                 <a name="" id="" class="btn btn-light"  href="index.php" role="button">Cancelar</a>
                            </div>
                            </div>

                        </form>
                    </div>
                </div>
           
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



