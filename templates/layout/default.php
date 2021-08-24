<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>

    <title><?= $this->fetch('title') ?></title>

    <?= $this->Html->css([
        '/lib/bootstrap-5.1/css/bootstrap.min.css',
        '/lib/bootstrap-icons-1.5/bootstrap-icons.css',
        '/lib/select2-4.1.0-rc.0/css/select2.min.css',
        '/lib/select2-4.1.0-rc.0/css/select2-bootstrap-5-theme.css',
        'style.css'
    ]) ?>

    <?= $this->fetch('css') ?>
</head>
<body>
    <?= $this->element('navbar') ?>

    <main class="container">
        <?= $this->Flash->render() ?>

        <?= $this->fetch('content') ?>
    </main>

    <?= $this->element('footer') ?>

    <?= $this->Html->script([
        '/lib/bootstrap-5.1/js/bootstrap.bundle.min.js',
        '/lib/jquery/jquery-3.6.0.min.js',
        '/lib/bootbox-5.5.2/js/bootbox.min.js',
        '/lib/bootbox-5.5.2/js/bootbox.locales.min.js',
        '/lib/select2-4.1.0-rc.0/js/select2.min.js',
        '/lib/select2-4.1.0-rc.0/js/i18n/fr.js',
        '/lib/xcrud/js/xcrud.js',
        'app.js'
    ]) ?>
    <?= $this->fetch('script') ?>
</body>
</html>
