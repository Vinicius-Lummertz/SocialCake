<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<?php if ($posts->isEmpty()): ?>
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 text-center text-slate-500">
        Nenhum post encontrado.
    </div>
<?php else: ?>
    <div class="flex flex-col gap-5">
        <?php foreach ($posts as $item): ?>
            <?= $this->element('feed/post_card', ['item' => $item]) ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>