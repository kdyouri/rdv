<?php
echo $this->Form->control('prenom', ['label' => 'Prénom']);
echo $this->Form->control('nom', ['label' => 'Nom']);
echo $this->Form->control('cin', ['label' => 'CIN (Si mineur mettre celui du titeur)']);
echo $this->Form->control('email', ['label' => 'E-mail']);
echo $this->Form->control('telephone', ['label' => 'Téléphone']);
echo $this->Form->control('date_naissance', ['label' => 'Date naissance']);
