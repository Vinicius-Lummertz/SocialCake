<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen">

    <div class="min-h-screen flex items-center justify-center bg-slate-100 px-4">
    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-8 border border-slate-200">
        <h1 class="text-2xl font-bold text-slate-800 mb-6 text-center">Entrar</h1>

        <?= $this->Flash->render() ?>

        <form method="post" action="<?= $this->Url->build('/login') ?>" class="space-y-4">
            <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Email ou username</label>
                <input
                    type="text"
                    name="identifier"
                    class="w-full border border-slate-300 rounded-xl px-4 py-3"
                    required
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Senha</label>
                <input
                    type="password"
                    name="password"
                    class="w-full border border-slate-300 rounded-xl px-4 py-3"
                    required
                >
            </div>

            <button
                type="submit"
                class="w-full bg-slate-900 text-white py-3 rounded-xl hover:bg-slate-800 transition"
            >
                Entrar
            </button>
        </form>

        <p class="text-sm text-slate-500 text-center mt-4">
            Não tem conta?
            <a href="<?= $this->Url->build('/register') ?>" class="text-slate-900 font-medium hover:underline">
                Criar conta
            </a>
        </p>
    </div>
</div>

</body>
</html>