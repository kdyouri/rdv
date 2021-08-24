<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?= $this->Form->create() ?>
    <h1 class="h3 mb-3 fw-normal">Veuillez vous connecter</h1>

    <div class="form-floating">
        <input type="email" class="form-control" name="email" id="floatingEmail" placeholder="E-mail">
        <label for="floatingEmail">Adresse E-mail</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Mot de passe">
        <label for="floatingPassword">Mot de passe</label>
    </div>

    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Se souvenir de moi
        </label>
    </div>
    <?= $this->Form->submit('Se connecter', ['class' => 'w-100 btn btn-lg btn-primary']); ?>

    <p class="mt-5 mb-3 text-muted">&copy; <?= date('Y') ?> Tous droits réservés.</p>
<?= $this->Form->end() ?>
