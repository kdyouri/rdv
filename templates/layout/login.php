<!doctype html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>

    <title><?= $this->fetch('title') ?></title>

    <?= $this->Html->css([
        '/lib/bootstrap-5.1/css/bootstrap.min.css',
        '/lib/bootstrap-icons-1.5/bootstrap-icons.css',
        'login.css'
    ]) ?>

    <?= $this->fetch('css') ?>
</head>
<body class="text-center">
    <main class="form-signin">
        <div style="font-size: 3rem;margin-bottom: 50px;">
            <i class="bi-calendar2-week-fill text-danger"></i> RDV
        </div>

        <?= $this->Flash->render() ?>

        <?= $this->fetch('content') ?>
    </main>

    <?= $this->Html->script([
        '/lib/bootstrap-5.1/js/bootstrap.bundle.min.js',
        '/lib/jquery/jquery-3.6.0.min.js'
    ]) ?>
    <?= $this->fetch('script') ?>
</body>
</html>
