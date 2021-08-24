<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Patient $patient
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Patient'), ['action' => 'edit', $patient->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Patient'), ['action' => 'delete', $patient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patient->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Patients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Patient'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="patients view content">
            <h3><?= h($patient->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Prenom') ?></th>
                    <td><?= h($patient->prenom) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nom') ?></th>
                    <td><?= h($patient->nom) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($patient->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telephone') ?></th>
                    <td><?= h($patient->telephone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($patient->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Naissance') ?></th>
                    <td><?= h($patient->date_naissance) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Rendezvous') ?></h4>
                <?php if (!empty($patient->rendezvous)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Patient Id') ?></th>
                            <th><?= __('Date Heure') ?></th>
                            <th><?= __('Remarque') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($patient->rendezvous as $rendezvous) : ?>
                        <tr>
                            <td><?= h($rendezvous->id) ?></td>
                            <td><?= h($rendezvous->patient_id) ?></td>
                            <td><?= h($rendezvous->date_heure) ?></td>
                            <td><?= h($rendezvous->remarque) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Rendezvous', 'action' => 'view', $rendezvous->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Rendezvous', 'action' => 'edit', $rendezvous->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rendezvous', 'action' => 'delete', $rendezvous->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rendezvous->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
