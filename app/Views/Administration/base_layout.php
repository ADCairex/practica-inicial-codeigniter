<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css'>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://kit.fontawesome.com/aac2b54c1b.js"></script>
        <?= $this->renderSection('css') ?>
        <?= $this->renderSection('javascript') ?>
    </head>
    <body>
        <div id="container">
            <?= $this->renderSection('content') ?>
        </div>
    </body>
</html>