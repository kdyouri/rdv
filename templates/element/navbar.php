<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= $this->Url->build('/') ?>"><i class="bi-calendar2-week-fill"></i> RDV</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link<?php if (@$activeNavItem == 'home') echo ' active'; ?>" aria-current="page" href="<?= $this->Url->build('/') ?>">Rendez-vous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?php if (@$activeNavItem == 'patients') echo ' active'; ?>" href="<?= $this->Url->build('/patients') ?>">Patients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?php if (@$activeNavItem == 'users') echo ' active'; ?>" href="<?= $this->Url->build('/users') ?>">Utilisateurs</a>
                </li>
            </ul>
            <div class="dropdown text-end">
                <a href="#" class="d-block text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi-person-circle" style="font-size:1.5rem"></i>
                </a>
                <ul class="dropdown-menu text-small dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Profil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?= $this->Url->build('/users/logout') ?>">Se déconnecter</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
