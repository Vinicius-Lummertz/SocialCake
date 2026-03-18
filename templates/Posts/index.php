<div class="min-h-screen bg-slate-100 py-8">
    <div class="max-w-2xl mx-auto px-4">

        <h1 class="text-2xl font-bold text-slate-800 mb-6">Feed</h1>

        <?= $this->Flash->render() ?>

        <?= $this->element('feed/post_list', ['posts' => $posts]) ?>
    </div>

    <?= $this->element('feed/floating_button') ?>

    <?= $this->element('feed/post_modal') ?>
</div>

<?= $this->element('footer') ?>

<script>
    const openBtn = document.getElementById('openPostModal');
    const closeBtn = document.getElementById('closePostModal');
    const cancelBtn = document.getElementById('cancelPostModal');
    const modal = document.getElementById('postModal');
    const textarea = document.getElementById('content');
    const charCount = document.getElementById('charCount');
    const form = document.getElementById('createPostForm');

    function openModal() {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => textarea.focus(), 50);
    }

    function closeModal() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    openBtn.addEventListener('click', openModal);
    closeBtn.addEventListener('click', closeModal);
    cancelBtn.addEventListener('click', closeModal);

    modal.addEventListener('click', function (e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });

    textarea.addEventListener('input', function () {
        charCount.textContent = textarea.value.length;
    });

    form.addEventListener('submit', function (e) {
        const content = textarea.value.trim();

        if (!content) {
            e.preventDefault();
            alert('Escreva algo antes de publicar.');
            return;
        }

        if (content.length > 1000) {
            e.preventDefault();
            alert('O post ultrapassa o limite de 1000 caracteres.');
        }
    });
</script>