<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'bd_blibioteca');

//Pegar a data atual
date_default_timezone_set('America/Sao_Paulo');
$date = date('d/m/y');


// initialize variables
$turno = "";
$quant = 0;
$data = $date;
$id = 0;
$update = false;

//Adicionar Registro
if (isset($_POST['save'])) {
    $turno = $_POST['turno'];
    $quant = $_POST['quant'];

    mysqli_query($db, "INSERT INTO user_note (turno, quant, data) VALUES ('$turno', '$quant', '$data')");
    $_SESSION['message'] = "Registrado";
    header('location: index.php');
}

// Botão Atualizar
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $turno = $_POST['turno'];
    $quant = $_POST['quant'];
    $data = $_POST['data'];

    mysqli_query($db, "UPDATE user_note SET turno='$turno', quant='$quant', data='$data' WHERE id=$id");
    $_SESSION['message'] = "Atualizado!";
    header('location: index.php');
}

//Botão Excluir
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM user_note WHERE id=$id");
    $_SESSION['message'] = "Excluido!";
    header('location: index.php');
}
