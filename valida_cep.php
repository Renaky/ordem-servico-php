<?php
// Verificar e buscar o CEP se estiver presente
if (isset($_POST['cep'])) {
    $cep = preg_replace('/[^0-9]/', '', $_POST['cep']);
    if (preg_match('/^[0-9]{8}$/', $cep)) {
        $url = "https://viacep.com.br/ws/{$cep}/json";
        $address_data = json_decode(file_get_contents($url), true);

        if (!isset($address_data['erro'])) {
            $endereco = $address_data['logradouro'];
            $bairro = $address_data['bairro'];
            $cidade = $address_data['localidade'];
            $uf = $address_data['uf'];
        } else {
            $_SESSION['texto_erro'] = 'CEP não encontrado!';
            header('Location: cad_cliente.php');
            exit();
        }
    } else {
        $_SESSION['texto_erro'] = 'CEP inválido!';
        header('Location: cad_cliente.php');
        exit();
    }
} else {
    // Caso o CEP não esteja presente, redirecione de volta ao formulário
    $_SESSION['texto_erro'] = 'CEP não informado!';
    header('Location: cad_cliente.php');
    exit();
}
?>