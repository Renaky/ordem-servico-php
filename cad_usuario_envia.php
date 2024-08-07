<?php
session_start();

require_once('valida_cep.php');

$nome = $_POST["nome"];
$senha = md5($_POST["senha"]);
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$numero = $_POST["numero"];
$cep = $_POST["cep"];
$endereco = $_POST["endereco"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];
$perfil = 1;
$status = $_POST["status"];
$data = date("Y-m-d");

require_once("bd/bd_usuario.php");
$dados = buscaUsuario($email);

if ($dados != 0) {
    $_SESSION['texto_erro'] = 'Este email já existe cadastrado no sistema!';
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;
    $_SESSION['telefone'] = $telefone;
    $_SESSION['cep'] = $cep;
    $_SESSION['endereco'] = $endereco;
    $_SESSION['numero'] = $numero;
    $_SESSION['bairro'] = $bairro;
    $_SESSION['cidade'] = $cidade;
    $_SESSION['uf'] = $uf;
    header("Location: cad_usuario.php");
} else {
    $dados = cadastraUsuario($nome, $email, $senha, $cep, $endereco, $numero, $bairro, $cidade, $uf, $status, $telefone, $perfil, $data);

    if ($dados == 1) {
        $_SESSION['texto_sucesso'] = 'Dados adicionados com sucesso.';
        unset($_SESSION['texto_erro']);
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['cep']);
        unset($_SESSION['endereco']);
        unset($_SESSION['bairro']);
        unset($_SESSION['cidade']);
        unset($_SESSION['uf']);
        unset($_SESSION['telefone']);
        unset($_SESSION['numero']);
        header("Location: usuario.php");
    } else {
        $_SESSION['texto_erro'] = 'Os dados não foram adicionados no sistema!';
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['cep'] = $cep;
        $_SESSION['endereco'] = $endereco;
        $_SESSION['numero'] = $numero;
        $_SESSION['bairro'] = $bairro;
        $_SESSION['cidade'] = $cidade;
        $_SESSION['uf'] = $uf;
        $_SESSION['telefone'] = $telefone;
        header("Location: cad_usuario.php");
    }
}
?>
