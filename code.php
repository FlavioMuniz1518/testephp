<?php
session_start();
require 'dbcon.php';

if(isset($_POST['deletar_cliente']))
{
    $cliente_id = mysqli_real_escape_string($con, $_POST['deletar_cliente']);

    $query = "DELETE FROM cliente WHERE cod_cliente='$cliente_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['mensagem'] = "Deletado com Sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensagem'] = "Não é permitir exclusão de clientes que possuam contatos associados";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['deletar_contato']))
{
    $contato_id = mysqli_real_escape_string($con, $_POST['deletar_contato']);

    $query = "DELETE FROM contato WHERE cod_contato='$contato_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['mensagem'] = "Contato deletado com Sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensagem'] = "Arquivo não Deletado";
        header("Location: index.php");
        exit(0);
    }
}


if(isset($_POST['editar']))
{
    $cliente_id= mysqli_real_escape_string($con, $_POST['cod_cliente']);
    

    $razao_social = mysqli_real_escape_string($con, $_POST['razao_social']);
    $nome_fantasia = mysqli_real_escape_string($con, $_POST['nome_fantasia']);
    $endereco = mysqli_real_escape_string($con, $_POST['endereco']);
    $complemento = mysqli_real_escape_string($con, $_POST['complemento']);
    $bairro = mysqli_real_escape_string($con, $_POST['bairro']);
    $cidade = mysqli_real_escape_string($con, $_POST['cidade']);
    $estado = mysqli_real_escape_string($con, $_POST['estado']);
    $data_inclusao = mysqli_real_escape_string($con, $_POST['data_inclusao']);
    

    $query = "UPDATE cliente SET razao_social='$razao_social', nome_fantasia='$nome_fantasia', endereco='$endereco', complemento= '$complemento', bairro='$bairro', cidade='$cidade', estado= '$estado', data_inclusao='$data_inclusao' WHERE cod_cliente='$cliente_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['mensagem'] = "Atualizado com Sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensagem'] = "Não Atualizado";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['salvar']))
{
   
    $razao_social = mysqli_real_escape_string($con, $_POST['razao_social']);
    $nome_fantasia = mysqli_real_escape_string($con, $_POST['nome_fantasia']);
    $endereco = mysqli_real_escape_string($con, $_POST['endereco']);
    $complemento = mysqli_real_escape_string($con, $_POST['complemento']);
    $bairro = mysqli_real_escape_string($con, $_POST['bairro']);
    $cidade = mysqli_real_escape_string($con, $_POST['cidade']);
    $estado = mysqli_real_escape_string($con, $_POST['estado']);
    $data_inclusao = mysqli_real_escape_string($con, $_POST['data_inclusao']);

    $query = "INSERT INTO cliente ( razao_social,nome_fantasia,endereco,complemento,bairro,cidade, estado,  data_inclusao) VALUES ( '$razao_social','$nome_fantasia','$endereco' , '$complemento','$bairro','$cidade', '$estado', '$data_inclusao')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['mensagem'] = "Cliente Castrado com sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensagem'] = "Cliente não Cadastrado";
        header("Location: index.php");
        exit(0);
    }
}
if(isset($_POST['editar_contato']))
{
    $cod_cliente= mysqli_real_escape_string($con, $_POST['cod_contato']);

    $nome_contato = mysqli_real_escape_string($con, $_POST['nome_contato']);
    $telefone_1 = mysqli_real_escape_string($con, $_POST['telefone_1']);
    $telefone_2 = mysqli_real_escape_string($con, $_POST['telefone_2']);
    $celular = mysqli_real_escape_string($con, $_POST['celular']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    
    

    $query = "UPDATE contato SET nome_contato='$nome_contato', telefone_1='$telefone_1', telefone_2='$telefone_2', celular= '$celular', email='$email' WHERE cod_contato='$cod_cliente' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['mensagem'] = "Atualizado com Sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensagem'] = "Não Atualizado";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['salvar_contato']))
{
   

    $cod_cliente= mysqli_real_escape_string($con, $_POST['cod_cliente']);

    $nome_contato = mysqli_real_escape_string($con, $_POST['nome_contato']);
    $telefone_1 = mysqli_real_escape_string($con, $_POST['telefone_1']);
    $telefone_2 = mysqli_real_escape_string($con, $_POST['telefone_2']);
    $celular = mysqli_real_escape_string($con, $_POST['celular']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    $query = "INSERT INTO contato ( cod_cliente, nome_contato,telefone_1,telefone_2,celular,email) VALUES ( '$cod_cliente','$nome_contato','$telefone_1' , '$telefone_2','$celular','$email')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['mensagem'] = "Contato Castrado com sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensagem'] = "Contato não Cadastrado";
        header("Location: index.php");
        exit(0);
    }
}

?>