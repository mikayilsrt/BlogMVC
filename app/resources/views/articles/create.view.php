<?php require_once __DIR__ . "/../layouts/header.view.php"; ?>

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

    <h1>Créer un article</h1>

    <div style="margin-top: 25px;">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="uk-margin">
                <input type="text" class="uk-input" name="title" placeholder="Titre de l'article" />
            </div>
            <div class="uk-margin">    
                <textarea type="text" class="uk-textarea" rows="5" name="content" placeholder="Contenue de l'article"></textarea>
            </div>
            <div class="uk-margin" uk-margin>
                <div uk-form-custom="target: true">
                    <input type="file" name="image">
                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled>
                </div>
                <button class="uk-button uk-button-default">Publier</button>
            </div>
        </form>
    </div>

</div>

<?php require_once __DIR__ . "/../layouts/footer.view.php"; ?>