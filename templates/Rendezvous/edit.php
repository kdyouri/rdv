<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Patient $rendezvous
 */
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Éditer rendez-vous</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <?= $this->Form->create($rendezvous, ['novalidate']) ?>
        <div class="modal-body">
            <?php
            echo $this->Flash->render();

            echo $this->Form->control('patient_id', ['options' => $patients]);
            echo $this->Form->control('date_heure', ['label' => 'Date & heure']);
            echo $this->Form->control('duree', ['label' => 'Durée (minutes)']);
            echo $this->Form->control('remarque');
            ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi-arrow-counterclockwise"></i> Annuler</button>
            <button type="submit" class="btn btn-primary"><i class="bi-save"></i> Enregistrer</button>
        </div>
        <?= $this->Form->end() ?>

        <!-- BOUTON SUPPRIMER: -->
        <div style="margin: -55px 0 15px 15px; width: 150px">
            <?= $this->Form->create(null, ['url' => '/rendezvous/delete/' . $rendezvous->id]) ?>

            <button type="button" class="btn btn-danger" onclick="var form = $(this).closest('form'); bootbox.confirm({title: 'Confirmation', message: $(this).data('confirm'), callback: function(r){ if (r) form.submit(); }});" data-confirm="Êtes-vous sûrs de vouloir supprimer ce rendez-vous ?">
                <i class="bi-trash-fill"></i> Supprimer
            </button>
            <?= $this->Form->end() ?>
        </div>

    </div>
</div>
