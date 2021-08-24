<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rendezvous[]|\Cake\Collection\CollectionInterface $rendezvous
 */

$this->Html->css([
    '/lib/fullcalendar-5.9.0/css/main.min.css',
    'Rendezvous/index.css'
], ['block' => true]);
$this->Html->script([
    '/lib/fullcalendar-5.9.0/js/main.min.js',
    '/lib/fullcalendar-5.9.0/js/locales/fr.js',
    'Rendezvous/index.js'
], ['block' => true]);
?>
<div class="rendezvous index content">
    <h3>Gestion des rendez-vous</h3>

    <div class="clearfix" style="margin-bottom: 10px">
        <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-success xcrud-btn-add float-end"><i class="bi-calendar-plus"></i> Nouveau rendez-vous</a>
    </div>

    <div id="calendar"></div>
</div>
