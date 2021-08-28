<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de gestão acadêmica</title>
</head>
<body>
    <?php
    require './Pessoa.php';
    require './Estudante.php';
    require './Professor.php';
    ?>
    
    <h2>Professor</h2>
    <?php
        $conexao = new Conn();
        $estudantes = $conexao->listarEstudantes();
        foreach ($estudantes as $key => $value) {
            echo $value['nome']."<a href='editarEstudante.php?email={$value['email']}'>Editar</a><br>";
        }    
    ?>
    
    <br><hr>
    
    <h2>Estudante</h2>
    <?php
    $estudante = new Estudante('paulo@paulo.com.br');
    $estudanteDados = $estudante->verEstudante();
    echo "Nome: {$estudanteDados->nome} <br>"; 
    echo "Telefone: {$estudanteDados->telefone} <br>";
    echo "Email: {$estudanteDados->email} <br>";
    echo "Matrícula: {$estudanteDados->matricula} <br>";
    echo "IRA: {$estudanteDados->ira} <br>";
    echo "Idade: {$estudante->calculaIdade($estudanteDados->data_nascimento)} <br>";
    echo "Avaliação: {$estudante->calculaAvaliacao()} <br>";
    ?>
    
</body>
</html>