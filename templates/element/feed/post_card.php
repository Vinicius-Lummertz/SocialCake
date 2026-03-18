<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<article class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5">
    <div class="flex items-center gap-3 mb-4">
        <div class="w-11 h-11 rounded-full bg-slate-300 flex items-center justify-center text-slate-700 font-semibold">
            <?= strtoupper(substr($item->user->name ?? 'U', 0, 1)) ?>
        </div>

        <div>
            <p class="font-semibold text-slate-800">
                <?= h($item->user->name ?? 'Usuário') ?>
            </p>
            <p class="text-sm text-slate-500">
                @<?= h($item->user->username ?? 'user') ?>
            </p>
        </div>
    </div>

    <div class="text-slate-700 whitespace-pre-line leading-relaxed">
        <?= h($item->content) ?>
    </div>

    <div class="mt-4 pt-4 border-t border-slate-100 text-sm text-slate-400">
        <?= $item->created ? $item->created->format('d/m/Y H:i') : '' ?>
    </div>
</article>