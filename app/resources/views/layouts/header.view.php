<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>App</title>

        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.4/css/uikit.min.css" />
        <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/assets/css/style.css" />
    </head>
    <body>
    <header>
        <nav class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-left">
                <!-- logo -->
                <a class="uk-navbar-item uk-logo" href="#">BLOG MVC</a>
                <!-- nav link -->
                <ul class="uk-navbar-nav">
                    <li><a href="/">Home</a></li>
                    <li><a href="/articles">Blog</a></li>
                    <?php if(!empty($_SESSION['user']['id'])): ?>
                        <li><a href="/new-article">Ajouter un article</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="uk-navbar-right">

                <ul class="uk-navbar-nav">
                    <?php if (!isset($_SESSION['user']) && empty($_SESSION['user'])): ?>
                        <li><a href="/login">Se connecter</a></li>
                        <li><a href="/register">S'inscrire</a></li>
                    <?php else: ?>
                        <li>
                            <a href="#"><?= $_SESSION['user']['name']; ?></a>
                            <div class="uk-navbar-dropdown">
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li class="uk-nav-header">Mon compte</li>
                                    <li><a href="/profile/<?= $_SESSION['user']['id']; ?>">Voir le profile</a></li>
                                    <li><a href="/profile/<?= $_SESSION['user']['id']; ?>/settings">Paramètres</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <form method="post" action="/logout">
                                        <li><button type="submit">Se déconnecter</button></li>
                                    </form>
                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>