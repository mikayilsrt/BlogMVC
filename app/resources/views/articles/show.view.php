<?php require_once __DIR__ . "/../layouts/header.view.php"; ?>

<div class="uk-container uk-container-small">

    <article class="uk-article">

        <h1 class="uk-article-title"><?= $article[0]['title']; ?></h1>

        <p class="uk-article-meta">Written by <a href="#"><?= $article[0]['name']; ?></a> on <?= $article[0]['created_at']; ?>.</p>

        <p class="uk-text-lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>

        <p><?= $article[0]['content']; ?></p>

    </article>

    <div style="margin-top: 25px;">
        <h3>Les commentaires : </h3>

        <article class="uk-comment" style="margin-top: 15px; margin-bottom: 20px;">
            <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
                <div class="uk-width-expand">
                    <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">Author</a></h4>
                    <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                        <li><a href="#">12 days ago</a></li>
                        <li><a href="#">Reply</a></li>
                    </ul>
                </div>
            </header>
            <div class="uk-comment-body">
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            </div>
        </article>
        <article class="uk-comment" style="margin-top: 15px; margin-bottom: 20px;">
            <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
                <div class="uk-width-expand">
                    <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">Author</a></h4>
                    <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                        <li><a href="#">12 days ago</a></li>
                        <li><a href="#">Reply</a></li>
                    </ul>
                </div>
            </header>
            <div class="uk-comment-body">
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            </div>
        </article>
    </div>

</div>

<?php require_once __DIR__ . "/../layouts/footer.view.php"; ?>