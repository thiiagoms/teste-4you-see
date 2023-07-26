<?php

declare(strict_types=1);

require_once __DIR__ . '/bootstrap.php';

/** @var \FourYouSee\Controllers\PlanController $app */
$products = $app->index();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    >
    <link rel="stylesheet" href="resources/css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vaga desenvolvedor Coodesh</title>
</head>

<body>
<div class="container">
    <div class="d-flex justify-content-center mt-3">
        <h1> <?= $products['product'] ?></h1>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Plano</th>
            <th scope="col">Descrição (nome)</th>
            <th scope="col">Localidade</th>
            <th scope="col">Preço</th>
            <th scope="col">Data de início</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($products['plans'] as $key => $product) : ?>
            <tr>
                <th scope="row">
                    <?= $product['id']; ?>
                </th>
                <td>
                    <?= $product['type']; ?>
                </td>
                <td>
                    <?= $product['name']; ?>
                </td>
                <td>
                    <?= $product['localidade']['nome']; ?>
                </td>
                <td>
                    R$ <?= $product['phonePrice']; ?>
                </td>
                <td>
                    <?= $product['schedule']['startDate']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>