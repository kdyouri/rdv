<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rendezvous $rendezvous
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Rendezvous'), ['action' => 'edit', $rendezvous->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Rendezvous'), ['action' => 'delete', $rendezvous->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rendezvous->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Rendezvous'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Rendezvous'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rendezvous view content">
            <h3><?= h($rendezvous->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Patient') ?></th>
                    <td><?= $rendezvous->has('patient') ? $this->Html->link($rendezvous->patient->id, ['controller' => 'Patients', 'action' => 'view', $rendezvous->patient->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($rendezvous->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Heure') ?></th>
                    <td><?= h($rendezvous->date_heure) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Remarque') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($rendezvous->remarque)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
