<?php require_once __DIR__ . "/../layouts/header.view.php"; ?>

<div class="uk-child-width uk-light" uk-grid>
    <div>
        <div class="uk-background-contain uk-background-muted uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-middle" style="background-image: url('https://images.unsplash.com/photo-1509822929063-6b6cfc9b42f2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80');background-size: cover !important;">
            <p class="uk-h4">Profile de : <?= $user['name']; ?></p>
        </div>
    </div>
</div>


<div class="uk-container uk-container-small">
    <div class="uk-text-center" uk-grid>
        <div class="uk-width-1-3@m">
            <div class="uk-card uk-card-body profile-card">
                <h3><?= $user['name']; ?></h3>
                <p><strong>Inscrit le : </strong><?= $user['created_at']; ?></p>
                <p><strong>Nombre d'article : </strong><?= count($articles); ?></p>
            </div>
        </div>
        <div class="uk-width-expand@m">
            <div class="uk-card uk-card-body">
                <?php foreach ($articles as $article): ?>
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-media-top">
                                <img src="../assets/img/posts/<?= $article['thumbnail']; ?>" alt="" style="width: 100%;max-height:250px;overflow:hidden;">
                            </div>
                            <div class="uk-card-body">
                                <h3 class="uk-card-title"><a href="/articles/<?= $article['id']; ?>">Media Top</a></h3>
                                <p><?= $article['content']; ?></p>
                            </div>
                        </div>
                    </div>
                    <br />
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . "/../layouts/footer.view.php"; ?>