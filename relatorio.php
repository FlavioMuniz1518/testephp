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

        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                    
                    </div>
                        <h5 style="text-align:center">Empresas sem Contatos Cadastrados</h5>
                        </div>
                  
                        <table class="table table-bordered">
                            <thead class="table-secondary">
                                <tr style="text-align:center">
                                    <th >Cód. Cliente</th>
                                    <th>Razão Social</th>
                                    <th>Nome Fantasia</th>
                                   
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                     
                                    $query = "SELECT DISTINCT c.cod_cliente, c.razao_social, c.nome_fantasia, c.data_inclusao, COUNT(p.cod_cliente) as quant FROM cliente AS c LEFT JOIN contato AS p on c.cod_cliente=p.cod_cliente  GROUP BY c.cod_cliente   HAVING quant =0 ";

                                    
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $cliente)
                                        
                                        {
                                            ?>
                                            <tr>
                                                <td style="text-align:center"><?= $cliente['cod_cliente']; ?></td>
                                                <td style="text-align:center"   ><?= $cliente['razao_social']; ?></td>
                                                <td  style="text-align:center"   ><?= $cliente['nome_fantasia']; ?></td>
                                               
                                                
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
                 </div>
        </div>
    </div>
</div>


   <div class="container mt-4">
         <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                    
                    </div>
                        <h5 style="text-align:center"> Contatos sem Telefone/celular</h5>
                        </div>
                  
                        <table class="table table-bordered">
                            <thead class="table-secondary">
                                <tr style="text-align:center">
                                    <th >Cód. Contato</th>
                                    <th>Nome do Contato</th>
                                    <th> Vinculado à Empresa</th>
                                   
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    
                                    $query = "SELECT DISTINCT p.cod_contato, c.nome_fantasia, p.nome_contato, 
                                    p.telefone_1, p.telefone_2, p.celular FROM cliente AS c LEFT JOIN contato AS p on 
                                    c.cod_cliente=p.cod_cliente  GROUP BY p.cod_contato   HAVING  p.telefone_1 = '' and p.telefone_2 = ''AND p.celular='' ";


                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $cliente)
                                        
                                        {
                                            ?>
                                            <tr>
                                                <td style="text-align:center"><?= $cliente['cod_contato']; ?></td>
                                                <td style="text-align:center"   ><?= $cliente['nome_contato']; ?></td>
                                                <td style="text-align:center"   ><?= $cliente['nome_fantasia']; ?></td>
                                                
                                               
                                                
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
                       </div>
                    </div>
                </div>
                <div >
                        
                         
                        
             </div>
            </div>
        </div>
        <div class="container mt-4">
         <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                    
                    </div>
                        <h5 style="text-align:center"> Contatos sem Email</h5>
                        </div>
                  
                        <table class="table table-bordered">
                            <thead class="table-secondary">
                                <tr style="text-align:center">
                                    <th >Cód. Contato</th>
                                    <th>Nome do Contato</th>
                                    <th> Vinculado à Empresa</th>
                                   
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    
                                    $query = "SELECT DISTINCT p.cod_contato, c.nome_fantasia, p.nome_contato, 
                                    p.telefone_1, p.telefone_2, p.email FROM cliente AS c LEFT JOIN contato AS p on 
                                    c.cod_cliente=p.cod_cliente  GROUP BY p.cod_contato   HAVING  p.email='' ";


                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $cliente)
                                        
                                        {
                                            ?>
                                            <tr>
                                                <td style="text-align:center"><?= $cliente['cod_contato']; ?></td>
                                                <td style="text-align:center"   ><?= $cliente['nome_contato']; ?></td>
                                                <td style="text-align:center"   ><?= $cliente['nome_fantasia']; ?></td>
                                                
                                               
                                                
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
                       </div>
                    </div>
                </div>
                <div >
                        
                            <a href="index.php" class="btn btn-warning" >Voltar</a>
                        
             </div>
            </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>