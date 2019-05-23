<?php require_once __DIR__ . "/../layouts/header.view.php"; ?>

<div class="uk-container uk-container-small">

    <article class="uk-article">

        <h1 class="uk-article-title"><?= $article[0]['title']; ?></h1>

        <p class="uk-article-meta">Written by <a href="/profile/<?= $article[0]['userID']; ?>"><strong><?= $article[0]['name']; ?></strong></a> on <?= $article[0]['created_at']; ?>.</p>

        <p class="uk-text-lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>

        <p><?= $article[0]['content']; ?></p>
        
        <form method="post" action="/vote">
            <button class="uk-button uk-button-secondary"><i uk-icon="heart"></i> <?= $nbVote[0]; ?></button>
            <input type="hidden" name="article_id" value="<?= $article[0]['id']; ?>" />
        </form>
    </article>

    <div style="margin-top: 25px;">
        <?php if (!empty($_SESSION['user'])): ?>
            <form method="post" action="/comments">
                <div class="uk-margin">
                    <textarea type="text" name="comment" class="uk-textarea" rows="5" placeholder="Votre commentaires"></textarea>
                    <input type="hidden" name="articleID" value="<?= $article[0]['id']; ?>" />
                </div>
                <div class="uk-margin">
                    <button class="uk-button uk-button-default">Publier</button>
                </div>
            </form>
        <?php endif; ?>

        <h3>Les commentaires : </h3>

        <?php if ($comments): foreach ($comments as $comment): ?>
            <article class="uk-comment" style="margin-top: 15px; margin-bottom: 20px;">
                <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
                    <div class="uk-width-expand">
                        <h4 class="uk-comment-title uk-margin-remove"><?= $comment['name']; ?></h4>
                        <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                            <li><?= $comment['created_at']; ?></li>
                        </ul>
                    </div>
                </header>
                <div class="uk-comment-body">
                    <p><?= $comment['content']; ?></p>
                </div>
            </article>
        <?php endforeach; else: ?>
            <article class="uk-comment" style="margin-top: 15px; margin-bottom: 20px;">
                <div class="uk-comment-body">
                    <p>Pas de commentaires.</p>
                </div>
            </article>
        <?php endif; ?>
    </div>

</div>

<?php require_once __DIR__ . "/../layouts/footer.view.php"; ?>