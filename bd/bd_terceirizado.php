<?php
require_once("conecta_bd.php");

function checaTerceirizado($email, $senha) {
    $conexao = conecta_bd();
    $senhaMd5 = md5($senha);
    $query = "SELECT * FROM terceirizado WHERE email='$email' AND senha='$senhaMd5'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    return $dados;
}

function listaTerceirizados() {
    $conexao = conecta_bd();
    $terceirizados = array();
    $query = "SELECT * FROM terceirizado ORDER BY nome";

    $resultado = mysqli_query($conexao, $query);
    while ($dados = mysqli_fetch_array($resultado)) {
        array_push($terceirizados, $dados);
    }
    return $terceirizados;
}

function buscaTerceirizado($email) {
    $conexao = conecta_bd();
    $query = "SELECT * FROM terceirizado WHERE email='$email'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_num_rows($resultado);

    return $dados;
}

function cadastraTerceirizado($nome, $email, $telefone, $senha, $cep, $endereco, $numero, $bairro, $cidade, $status, $perfil, $data) {
    $conexao = conecta_bd();
    $query = "INSERT INTO terceirizado (nome, email, telefone, senha, cep, endereco, numero, bairro, cidade, status, perfil, data) VALUES ('$nome', '$email', '$telefone', '$senha', '$cep', '$endereco', '$numero', '$bairro', '$cidade', '$status', '$perfil', '$data')";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao);

    return $dados;
}

function removeTerceirizado($codigo) {
    $conexao = conecta_bd();
    $query = "DELETE FROM terceirizado WHERE cod = '$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao);

    return $dados;
}

function buscaTerceirizadoeditar($codigo) {
    $conexao = conecta_bd();
    $query = "SELECT * FROM terceirizado WHERE cod='$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    return $dados;
}

function editarTerceirizado($codigo, $status, $data) {
    $conexao = conecta_bd();
    $query = "SELECT * FROM terceirizado WHERE cod='$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_num_rows($resultado);
    if ($dados == 1) {
        $query = "UPDATE terceirizado SET status = '$status', data = '$data' WHERE cod = '$codigo'";
        $resultado = mysqli_query($conexao, $query);
        $dados = mysqli_affected_rows($conexao);
        return $dados;
    }
}
?>
