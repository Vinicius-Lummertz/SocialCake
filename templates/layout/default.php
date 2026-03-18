<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Social';
$auth = $this->request->getSession()->read('Auth');
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="bg-gradient-to-br from-slate-100 via-slate-200 to-slate-300 min-h-screen">

    <!-- NAVBAR -->
    <header class="fixed top-0 left-0 w-full z-50">
        <div class="mx-auto max-w-7xl px-6 py-3">
            <div class="flex items-center justify-between 
                        bg-white/30 backdrop-blur-xl 
                        border border-white/20 
                        shadow-lg rounded-2xl px-6 py-3">

                <!-- LOGO -->
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-slate-900"></div>
                    <span class="font-semibold text-slate-800 text-lg tracking-tight">
                        MeuApp
                    </span>
                </div>

                <!-- LINKS -->
                <nav class="hidden md:flex items-center gap-6 text-sm font-medium text-slate-700">
                    <a href="/" class="hover:text-slate-900 transition">Home</a>
                    <a href="/products" class="hover:text-slate-900 transition">Produtos</a>
                    <a href="#" class="hover:text-slate-900 transition">Sobre</a>
                </nav>

                <!-- ACTIONS -->
                <?php if ($auth):?>
                    <span class="text-sm text-slate-700">
                        <?= h($auth['name']) ?>
                    </span>
                    <a href="<?= $this->Url->build('/logout') ?>" class="text-sm text-red-600">Sair</a>
                <?php else: ?>
                <div class="flex items-center gap-3">
                    <a href="/login"
                       class="text-sm text-slate-700 hover:text-slate-900 transition">
                        Entrar
                    </a>

                    <a href="/register"
                       class="bg-slate-900 text-white text-sm px-4 py-2 rounded-xl 
                              hover:bg-slate-800 transition shadow">
                        Criar conta
                    </a>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- ESPAÇO PRA NÃO FICAR SOB A NAV -->
    <div class="h-24"></div>

    <!-- CONTEÚDO -->
    <main class="px-6">
        <?= $this->fetch('content') ?>
    </main>

</body>
</html>
