<?= $this->extend('backend/templates/email') ?>

<?= $this->section('head') ?>
<title>
    <?= esc($prospect['name']) ?>
</title>

<meta name="description" content="prospecto google ads.">

<style>
    body {
        font-family: Arial, sans-serif;
    }

    .card {
        width: 300px;
        background-color: #f7f7f7;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px;
    }

    .card h2 {
        color: #333;
        margin-bottom: 10px;
    }

    .card p {
        color: #555;
        margin-bottom: 5px;
    }

    .card span {
        font-weight: bold;
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1 class="text-2xl font-bold underline decoration-wavy decoration-accent underline-offset-4 mb-4">
    Prospecto Google Ads
</h1>
<div class="card">
    <p>
        <span>Nombre:</span> <?= esc($prospect['name']) ?>
    </p>
    <p>
        <span>Email:</span> <?= esc($prospect['email']) ?>
    </p>
    <p>
        <span>Teléfono:</span> <?= esc($prospect['phone']) ?>
    </p>
    <p>
        <span>Fecha del evento:</span> <?= esc($prospect['date']) ?>
    </p>

    <p>
        <span>Origen Landing:</span> <?= esc($landing['name']) ?>
    </p>
</div>
<?= $this->endSection() ?>