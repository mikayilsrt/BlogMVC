<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>App</title>

        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.4/css/uikit.min.css" />
    </head>
    <body>
    <header>
        <nav class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-left">
                <!-- logo -->
                <a class="uk-navbar-item uk-logo" href="#">BLOG MVC</a>
                <!-- nav link -->
                <ul class="uk-navbar-nav">
                    <li class="uk-active"><a href="#">Home</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>
            <div class="uk-navbar-right">

                <ul class="uk-navbar-nav">
                    <li><a href="#">Se connecter</a></li>
                    <li><a href="#">S'inscrire</a></li>
                    <li>
                        <a href="#">username</a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-nav-header">Mon compte</li>
                                <li><a href="#">Voir le profile</a></li>
                                <li><a href="#">Paramètres</a></li>
                                <li class="uk-nav-divider"></li>
                                <li><a href="#">Se déconnecter</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>