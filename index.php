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

    <title>Teste de PHP</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('mensagem.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                        <a   href="relatorio.php" style="text-align:right"  class="btn btn-warning">Relatório de Clientes/Contatos</a> 
                    </div>
                        <h5 style="text-align:center" >Cadastro de Clientes/Contatos  
                              </h5>
                        </div>
                  
                        <table class="table table-bordered">
                            <thead class="table-secondary">
                                <tr style="text-align:center">
                                    <th >Cód. Cliente</th>
                                    <th>Razão Social</th>
                                    <th>Nome Fantasia</th>
                                    <th>Data de Inclusão</th>
                                  
                                    <th>Nº de Contatos</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                    $query = "SELECT DISTINCT c.cod_cliente, c.razao_social, c.nome_fantasia, c.data_inclusao, COUNT(p.cod_cliente) as quant FROM cliente AS c LEFT JOIN contato AS p on 
                                    c.cod_cliente=p.cod_cliente GROUP BY c.cod_cliente ";


                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $cliente)
                                        
                                        {
                                            ?>
                                            <tr>
                                                <td style="text-align:right"><?= $cliente['cod_cliente']; ?></td>
                                                <td><?= $cliente['razao_social']; ?></td>
                                                <td><?= $cliente['nome_fantasia']; ?></td>
                                                
                                                <td style="text-align:center"><?=  date('d/m/Y', strtotime ($cliente['data_inclusao'])); ?></td>
                                               
                                                <td style="text-align:right"><?= $cliente['quant']; ?></td>
                                                <td style="text-align:center"><a href="editar.php?id=<?= $cliente['cod_cliente']; ?>" class="btn btn-link">Editar</a>
                                                
                                                <form action="code.php" method="POST" class="d-inline"><button type="submit" name="deletar_cliente" value="<?=$cliente['cod_cliente'];?>" class="btn btn-link">Excluir</button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        
                                    }
                                ?>
                                
                            </tbody>
                            
                        </table>
                        <div >

                            
                        
                            <a href="cadastrar.php" class="btn btn-light"  >Novo</a>
                        
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>