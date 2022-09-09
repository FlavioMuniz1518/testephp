<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Teste PHP</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('mensagem.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div>
                    <div>
                        <h5>Inclusão/Edição de Contatos 
                           
                        </h5>
                    </div>
                    </div>
                        <div >

                        <?php
                        if(isset($_GET['id']))
                        {
                            $cliente_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM cliente WHERE cod_cliente='$cliente_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $cliente = mysqli_fetch_array($query_run);
                                ?>
                                <form class="card-header" style="background-color:#c9c9c9" action="code.php" method="POST">
                                <input type="hidden" name="cod_cliente" value="<?= $cliente['cod_cliente']; ?>">
                                
                                          <div class="mb-3">
                                        <label class="col-sm-1 col-form-label">Cliente</label>
                                        <input size="70" type="text"  readonly="readonly"   name="razao_social" value="<?= $cliente['razao_social']; ?>" class="form-inline">
                                        </div>

                                        <div class="mb-3">
                                        <label class="col-sm-1 col-form-label">Cód. Contato</label>
                                        <input size="10" type="text" disabled="disabled" name="cod_cliente" class="form-inline">
                                        </div>

                                        <div class="mb-3">
                                        <label class="col-sm-1 col-form-label">Nome</label>
                                        <input size="70" maxlength=70   type="text" name="nome_contato" required   class="form-inline">
                                        </div>

                                        <div class="mb-3">
                                        <label class="col-sm-1 col-form-label">Telefone 1</label>
                                        <input size="80" maxlength=11  type="tel" name="telefone_1"   class="form-inline">
                                        </div>

                                      <div class="mb-3">
                                      <label class="col-sm-1 col-form-label">Telefone 2</label>
                                      <input size="80" type="tel" maxlength=11 name="telefone_2" class="form-inline">
                                      </div>

                                     <div class="mb-3">
                                     <label class="col-sm-1 col-form-label">Celular</label>
                                     <input  size="80" type="tel" maxlength=11 name="celular"  class="form-inline">
                                     </div>

                                     <div class="mb-3">
                                     <label class="col-sm-1 col-form-label">Email</label>
                                     <input type="text" size="80" name="email"    class="form-inline">
                                       </div>


                                             <div class="card-header" style="text-align:center">
                                          <button type="submit" name="salvar_contato" class="btn btn-light" >Gravar</button>
                                         <a name="" id="" class="btn btn-light"  href="index.php" role="button">Cancelar</a>
                                  </div>
                            </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>









