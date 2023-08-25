<?php


function checkRole($requiredRole, $authDir)
{
    if(!isset($_SESSION)){

        session_start();
        
    }
    if (!isset($_SESSION['log']) || $_SESSION['log'] !== 'True') {
        header("Location: $authDir");
        exit();
    }

    if ($_SESSION['role'] !== $requiredRole) {
        header("Location: $authDir");
        exit();
    }
}

function show404()
{
    header("HTTP/1.0 404 Not Found");
    include('auth_notfound.php');
    exit();
}
