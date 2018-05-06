<?php

/*avisar sobre erros graves*/
mysqli_report(MYSQLI_REPORT_STRICT);

/*abre a conexão com a base de dados*/
function open_database()
{
    try {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        return $conn;
    } catch (Exception $e) {
        echo $e->getMessage();
        return null;
    }
}

/*Fecha a conexão com a base de dados*/
function close_database($conn)
{
    try {
        mysqli_close($conn);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}