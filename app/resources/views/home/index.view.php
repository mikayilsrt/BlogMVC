<?php require_once __DIR__ . "/../layouts/header.view.php"; ?>

    <div class="uk-container">

        <div style="margin-top: 35px;" class="uk-height-medium uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light"
            data-src="assets/img/cover-home.jpg"
            data-sizes="(min-width: 650px) 650px, 100vw" uk-img>
            <h1 style="text-transform: uppercase;">Bienvenue sur le blog du SIO</h1>
        </div>

        <h3>Les dernier articles :</h3>

        <div class="uk-child-width-1-3@m" uk-grid>
            <?php foreach ($articles as $article): ?>
                <div>
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top">
                            <img src="./assets/img/posts/<?= $article['thumbnail']; ?>" alt="" style="width: 100%;max-height:250px;overflow:hidden;">
                        </div>
                        <div class="uk-card-body">
                            <h3 class="uk-card-title"><a href="/articles/<?= $article['id']; ?>"><?= $article['title']; ?></a></h3>
                            <p style="max-height: 120px;overflow: hidden;"><?= $article['content']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php require_once __DIR__ . "/../layouts/footer.view.php"; ?>