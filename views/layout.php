<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="color-scheme" content="light dark">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="/public/assets/css/global.css" rel="stylesheet">
    <title><?=$title?></title>
</head>
<body>

<!-- TODO: Logic for header/footer-<=role?> -->

<?php

var_dump($_SESSION);
?>
<form action="/logout" method="POST">
    <button type="submit">Déconnecter</button>
</form>
<?php
if(isset($_SESSION['user']) && is_array($_SESSION['user'])) {
    $role = $_SESSION['user']['role'] ?? null;
    if ($role == 'admin') {
        include 'views/includes/header-admin.php';
    }
    if ($role == 'hero') {
        include 'views/includes/header-hero.php';
    }
    if ($role == 'user') {
        include 'views/includes/header-user.php';
    }
}
else include 'views/includes/header-default.php';
?>
<main>
    <?php
    include $viewFile;
    ?>
</main>

<?php include "includes/footer-default.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
