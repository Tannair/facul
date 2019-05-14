<?php

function bancoMySqli () {
    $servidor = 'localhost';
    $user = 'root';
    $banco = 'atividade9';

    $con = mysqli_connect($servidor, $user, '', $banco);
    mysqli_set_charset($con, "utf8");

    return $con;
}