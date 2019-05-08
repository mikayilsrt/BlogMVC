<?php require_once __DIR__ . "/../layouts/header.view.php"; ?>

<div class="uk-container uk-container-small">
    <?php if ($articles): foreach ($articles as $article): ?>
        <article class="uk-article">

            <h1 class="uk-article-title"><a class="uk-link-reset" href="/articles/<?= $article['id']; ?>"><?= $article['title'] ?></a></h1>

            <p class="uk-article-meta">Written by <a href="#"><?= $article['name'] ?></a> on <?= $article['created_at'] ?>.</p>

            <p class="uk-text-lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>

            <p><?= $article['content'] ?></p>

            <div class="uk-grid-small uk-child-width-auto" uk-grid>
                <div>
                    <a class="uk-button uk-button-text" href="/articles/<?= $article['id']; ?>">Read more</a>
                </div>
                <div>
                    <a class="uk-button uk-button-text" href="#">5 Comments</a>
                </div>
            </div>

        </article>
    <?php endforeach; endif; ?>

</div>

<?php require_once __DIR__ . "/../layouts/footer.view.php"; ?>