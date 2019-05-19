<?php require_once __DIR__ . "/../layouts/header.view.php"; ?>

<div class="uk-child-width uk-light" uk-grid>
    <div>
        <div class="uk-background-contain uk-background-muted uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-middle" style="background-image: url('https://images.unsplash.com/photo-1509822929063-6b6cfc9b42f2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80');background-size: cover !important;">
            <p class="uk-h4">Paramètre</p>
        </div>
    </div>
</div>

<div class="uk-container uk-container-small">
    <?php if (!empty($messages['errors'])): foreach ($messages['errors'] as $message): ?>
        <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?= $message ?></p>
        </div>
    <?php endforeach; endif; ?>

    <?php if (!empty($messages['success'])): foreach ($messages['success'] as $message): ?>
        <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?= $message ?></p>
        </div>
    <?php endforeach; endif; ?>

    <h3>Paramètre</h3>

    <form method="post" action="/profile/<?= $_SESSION['user']['id']; ?>/settings">
        <div class="uk-margin">
            <input class="uk-input uk-form-width-auto" name="name" type="text" placeholder="Nom d'utilisateur" value="<?= $user['name']; ?>" required>
        </div>
        <div class="uk-margin">
            <input class="uk-input uk-form-width-auto" name="email" type="email" placeholder="e-mail" value="<?= $user['email']; ?>" required>
        </div>
        <div class="uk-margin">
            <input class="uk-input uk-form-width-auto" name="password" type="password" placeholder="mot de passe" required>
        </div>
        <div class="uk-margin">
            <input class="uk-input uk-form-width-auto" name="confirm_password" type="password" placeholder="Confirmez votre mot de passe" required>
        </div>
        <div class="uk-margin">
            <button type="submit" class="uk-button uk-button-default">Mettre à jour</button>
        </div>
    </form>
</div>

<?php require_once __DIR__ . "/../layouts/footer.view.php"; ?>