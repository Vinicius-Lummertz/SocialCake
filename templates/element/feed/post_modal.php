<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<div
    id="postModal"
    class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden items-center justify-center z-50 px-4"
>
    <div class="w-full max-w-xl bg-white rounded-3xl shadow-2xl border border-slate-200 p-6 relative">
        
        <button
            id="closePostModal"
            type="button"
            class="absolute top-4 right-4 w-10 h-10 rounded-full hover:bg-slate-100 text-slate-500 text-xl transition"
        >
            ×
        </button>

        <h2 class="text-xl font-bold text-slate-800 mb-5">Criar post</h2>

        <form
            method="post"
            action="<?= $this->Url->build(['controller' => 'Posts', 'action' => 'index']) ?>"
            id="createPostForm"
            class="space-y-4"
        >
            <input
                type="hidden"
                name="_csrfToken"
                value="<?= $this->request->getAttribute('csrfToken') ?>"
            >

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Conteúdo
                </label>
                <textarea
                    name="content"
                    id="content"
                    rows="6"
                    maxlength="1000"
                    class="w-full border border-slate-300 rounded-2xl px-4 py-3 resize-none focus:outline-none focus:ring-2 focus:ring-slate-400"
                    placeholder="No que você está pensando?"
                    required
                ></textarea>
                <div class="mt-2 text-right text-sm text-slate-400">
                    <span id="charCount">0</span>/1000
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <button
                    type="button"
                    id="cancelPostModal"
                    class="px-4 py-2 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 transition"
                >
                    Cancelar
                </button>

                <button
                    type="submit"
                    class="px-5 py-2 rounded-xl bg-slate-900 text-white hover:bg-slate-800 transition"
                >
                    Publicar
                </button>
            </div>
        </form>
    </div>
</div>