<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Patient[]|\Cake\Collection\CollectionInterface $patients
 */

echo $this->Flash->render()
?>

<div class="patients index content xcrud-main">
    <h3>Gestion des patients</h3>

    <div class="clearfix" style="margin-bottom: 10px">
        <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-success xcrud-btn-add float-end"><i class="bi-person-plus-fill"></i> Nouveau patient</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-cakephp">
            <thead>
                <tr>
                    <th class="sorting xcrud-sort"><?= $this->Paginator->sort('prenom', 'Prénom') ?></th>
                    <th class="sorting xcrud-sort"><?= $this->Paginator->sort('nom', 'Nom') ?></th>
                    <th class="sorting xcrud-sort"><?= $this->Paginator->sort('cin', 'CIN') ?></th>
                    <th class="sorting xcrud-sort"><?= $this->Paginator->sort('email', 'E-mail') ?></th>
                    <th class="sorting xcrud-sort"><?= $this->Paginator->sort('telephone', 'Téléphone') ?></th>
                    <th class="sorting xcrud-sort"><?= $this->Paginator->sort('date_naissance', 'Date naissance') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($patients as $patient): ?>
                <tr>
                    <td><?= h($patient->prenom) ?></td>
                    <td><?= h($patient->nom) ?></td>
                    <td><?= h($patient->cin) ?></td>
                    <td><?= h($patient->email) ?></td>
                    <td><?= h($patient->telephone) ?></td>
                    <td><?= h($patient->date_naissance) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="bi-pencil-fill"></i>', ['action' => 'edit', $patient->id], ['class' => 'btn btn-warning btn-sm xcrud-btn-edit', 'data-bs-toggle' => 'tooltip', 'title' => 'Éditer', 'escape' => false]) ?>
                        <?= $this->Html->link('<i class="bi-x-lg"></i>', ['action' => 'delete', $patient->id], ['data-msg' => sprintf('Êtes-vous sûrs de vouloir supprimer le patient `%s %s` ?', $patient->prenom, $patient->nom), 'class' => 'btn btn-danger btn-sm xcrud-btn-delete', 'data-bs-toggle' => 'tooltip', 'title' => 'Supprimer', 'escape' => false]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col">
            <?= $this->Paginator->counter(__('Page {{page}} sur {{pages}}, affichant {{current}} enregistrement(s) de {{count}} au total')) ?>
        </div>
        <div class="col">
            <ul class="pagination xcrud-paginate justify-content-end">
                <?= $this->Paginator->prev('«') ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next('»') ?>
            </ul>
        </div>
    </div>
</div>
