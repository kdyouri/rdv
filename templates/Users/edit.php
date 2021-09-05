<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Patient $patient
 */
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><?= ($type == 'password')? 'Modifier le mot de passe': 'Éditer patient'?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <?= $this->Form->create($user, ['novalidate']) ?>
        <div class="modal-body">
            <?= $this->Flash->render(); ?>

            <?php
            if($type == 'password') {
                echo $this->Form->control('password', ['label' => 'Nouveau mot de passe']);
            }else{
                echo $this->Form->control('email', ['label' => 'Nom d\'utilisateur']);
            }
            ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary float-start" data-bs-dismiss="modal"><i class="bi-arrow-counterclockwise"></i> Annuler</button>
            <button type="submit" class="btn btn-primary float-end"><i class="bi-save"></i> Enregistrer</button>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
