<?php

require "./lib/JSONReader.php";
require "./class/User.php";
require "./lib/searchFunctions.php";

$utenti = JSONReader("./dataset/users-management-system.json");


if(isset($_GET['nome']) && trim($_GET['nome']) !== ''){
    $searchText = trim(filter_var($_GET['nome'], FILTER_SANITIZE_STRING)); 
    $utenti = array_filter($utenti,searchTextName($searchText));
}

if(isset($_GET['cognome']) && trim($_GET['cognome']) !== ''){
    $searchText = trim(filter_var($_GET['cognome'], FILTER_SANITIZE_STRING)); 
    $utenti = array_filter($utenti,searchTextLastName($searchText));
}

if(isset($_GET['email']) && trim($_GET['email']) !== ''){
    $searchText = trim(filter_var($_GET['email'], FILTER_SANITIZE_STRING)); 
    $utenti = array_filter($utenti,searchTextEmail($searchText));
}

if(isset($_GET['id']) && trim($_GET['id']) !== ''){
    $searchText = trim(filter_var($_GET['id'], FILTER_SANITIZE_STRING)); 
    $utenti = array_filter($utenti,searchTextID($searchText));
}


?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        input.form-control {
            padding: 2px;
            line-height: 100%;
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
<form action="index.php">
    <header class="container-fluid bg-secondary text-light p-2">
        <div class="container">
            <h1 class="display-3 mb-0">
                User management system
            </h1>
            <h2 class="display-6">user list</h2>
        </div>
    </header>
    <div class="container">
        <table class="table">
            <tr>
                <th>id</th>
                <th>nome</th>
                <th>cognome</th>
                <th>email</th>
                <th cellspan="2">età</th>
            </tr>
            <tr>
                <th>
                    <input class="form-control" type="text" name="id" ">
                </th>

                <th>
                    <input class="form-control" type="text" name="nome">
                </th>

                <th>
                    <input class="form-control" type="text" name="cognome" >
                </th>

                <th>
                    <input class="form-control" type="text" name="email" >
                </th>

                <th>
                    <input class="form-control" type="text" name="eta" >
                </th>
                <th>
                    <button class="btn btn-primary">cerca</button>
                </th>
            </tr>
            <tr>
                <?php
                foreach ($utenti as $utente){
                    $user = new User();
                    $user -> setUserID( $utente['id']);
                    $user -> setFirstName($utente['firstName']);
                    $user -> setLastName($utente['lastName']);
                    $user -> setBirthday($utente['birthday']);
                    $user -> setEmail($utente['email']);
                ?>
                <td><?= $user->getUserID()?></td>
                <td><?= $user->getFirstName()?></td>
                <td><?= $user->sanitizeLastName()?></td>
                <td><?= $user->getEmail()?></td>
                <td><?= $user->getAge()?></td>
                <td><?= $user->isAdult()?></td>
            </tr>
            <?php } ?>
            <!--<tr>
                <td>13</td>
                <td>Mario</td>
                <td>Mario</td>
                <td>mariomario@email.com</td>
                <td>20 </td>
            </tr>-->
        </table>
    </div>
</form>
</body>
</html>