<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<div class="min-h-screen flex items-center justify-center bg-slate-100 px-4">
    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-8 border border-slate-200">
        <h1 class="text-2xl font-bold text-slate-800 mb-6 text-center">Criar conta</h1>

        <?= $this->Flash->render() ?>

        <form method="post" action="<?= $this->Url->build('/register') ?>" class="space-y-4">
            <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Nome</label>
                <input
                    type="text"
                    name="name"
                    class="w-full border border-slate-300 rounded-xl px-4 py-3"
                    required
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Username</label>
                <input
                    type="text"
                    name="username"
                    class="w-full border border-slate-300 rounded-xl px-4 py-3"
                    required
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                <input
                    type="email"
                    name="email"
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
                Cadastrar
            </button>
        </form>

        <p class="text-sm text-slate-500 text-center mt-4">
            Já tem conta?
            <a href="<?= $this->Url->build('/login') ?>" class="text-slate-900 font-medium hover:underline">
                Entrar
            </a>
        </p>
    </div>
</div>
<?= $this->element('footer') ?>