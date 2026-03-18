<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->fetch('title') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100">
    <?= $this->fetch('content') ?>
</body>
</html>