<?= $this->extend('backend/templates/email') ?>

<?= $this->section('head') ?>
    <title>
        Recupera tu Cuenta
    </title>

    <meta
        name="description"
        content="Recupera tu Cuenta."
    >
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1 class="text-2xl font-bold decoration-accent underline-offset-4 mb-4">
        Recupera tu Cuenta
    </h1>

    <p class="text-justify mb-4">
        ¡Hola <?= esc(word_limiter($user['name'], 1, '')) ?>!,
        <br>
        Presiona el botón de Recuperación, para completar tu solicitud.
    </p>

    <p class="text-center mb-2">
        <a
            href="<?= url_to('backend.auth.recovery', $user['id'], $key) ?>"
            class="btn bg-gradient-to-r from-cyan-500 to-blue-500 btn-wide text-white font-bold py-3 rounded-xl cursor-pointer hover:opacity-90 transition"
        >
            Recuperación de Cuenta
        </a>
    </p>

    <p class="text-center">
        <small>
        Si desconoces este movimiento, por favor ignora este mensaje.
        </small>
    </p>
<?= $this->endSection() ?>
