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
                        <h5>Inclusão/Edição de Clientes/Contatos 
                           
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
                                <input size="10" type="hidden"  name="data_inclusao" value="<?=$cliente['data_inclusao'];?>" class="form-inline">

                                        <div class="mb-3">
                                        <label class="col-sm-1 col-form-label">Cód. Cliente</label>
                                        <input size="10" type="text" readonly="readonly" name="cod_cliente" value="<?=$cliente['cod_cliente'];?>" class="form-inline">
                                        </div>

                                        <div class="mb-3">
                                        <label class="col-sm-1 col-form-label">Razão Social</label>
                                        <input size="70" type="text"  required  name="razao_social" value="<?= $cliente['razao_social']; ?>" class="form-inline">
                                        </div>

                                        <div class="mb-3">
                                        <label class="col-sm-1 col-form-label">Nome Fantasia</label>
                                        <input size="80" type="text" required  name="nome_fantasia" value="<?= $cliente['nome_fantasia']; ?>"   class="form-inline">
                                        </div>

                                      <div class="mb-3">
                                      <label class="col-sm-1 col-form-label">Endereço</label>
                                      <input size="80" type="text" maxlength=60 name="endereco" value="<?= $cliente['endereco']; ?>" class="form-inline">
                                      </div>

                                     <div class="mb-3">
                                     <label class="col-sm-1 col-form-label">Complemento</label>
                                     <input  size="80" type="text"  maxlength=60 name="complemento" value="<?= $cliente['complemento']; ?>" class="form-inline">
                                     </div>

                                     <div class="mb-3">
                                     <label class="col-sm-1 col-form-label">Bairro</label>
                                     <input type="text" size="80" maxlength=60 name="bairro" value="<?= $cliente['bairro']; ?>"   class="form-inline">
                                       </div>

                                       <div class="mb-3">
                                       <label class="col-sm-1 col-form-label">Cidade</label>
                                      <input size="60" type="text"  maxlength=60 name="cidade"  value="<?= $cliente['cidade']; ?>"     class="form-inline">
                                       </div>

                                         <div class="mb-3">
                                         <label class="col-sm-1 col-form-label">Estado</label>
                                          <input size="5"  maxlength=2  type="text" name="estado"  value="<?= $cliente['estado']; ?>"    class="form-inline">
                                           </div>

                                          <div class="mb-3">
                                          <label class="col-sm-1 col-form-label">Data inclusão</label>
                                          <input size="8" type="text" name="" readonly="readonly"    value="<?=  date('d/m/Y', strtotime ($cliente['data_inclusao'])); ?>"    class="form-inline">

                                         


                                          </div>

                                             <div class="card-header" style="text-align:center">
                                          <button type="submit" name="editar" class="btn btn-light" >Gravar</button>
                                         <a name="" id="" class="btn btn-light"  href="index.php" role="button">Cancelar</a>
                                  </div>
                            </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>Tabela Vazia</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">

        <?php include('mensagem.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Cadastro de Clientes/Contatos </h5>

                        <table class="table table-bordered">
                            <thead class="table-secondary">
                                <tr style="text-align:center">
                                    <th >Cód. Contato</th>
                                    <th>Nome</th>
                                    <th>Telefones</th>
                                    <th>celular</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                  $cliente_id = mysqli_real_escape_string($con, $_GET['id']);
                                  $query = "SELECT * FROM contato WHERE cod_cliente='$cliente_id' ";

                                  
                                    
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $cliente)
                                        {
                                            ?>
                                            <tr>
                                                <td style="text-align:right"><?= $cliente['cod_contato']; ?></td>
                                                <td><?= $cliente['nome_contato']; ?></td>
                                                <td><?= $cliente['telefone_1'];  ?> <br><?= $cliente['telefone_2']; ?> </td>
                                              
                                                <td ><?= $cliente['celular']; ?></td>
                                                <td ><?= $cliente['email']; ?></td>

                                                <td style="text-align:center"><a href="contato.php?id=<?= $cliente['cod_contato']; ?>" class="btn btn-link">Editar</a>
                                                
                                                <form action="code.php" method="POST" class="d-inline"><button type="submit" name="deletar_contato" value="<?=$cliente['cod_contato'];?>" class="btn btn-link">Excluir</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5>  </h5>";
                                    }
                                ?>
                                
                            </tbody>
                            
                        </table>
                        <div >
                        
                            <a href="contatocad.php?id=<?= $cliente['cod_cliente']; ?>" class="btn btn-light" >Novo</a>
                        
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>









