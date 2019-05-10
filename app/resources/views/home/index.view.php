<?php require_once __DIR__ . "/../layouts/header.view.php"; ?>

    <!-- Carousel -->
    <div class="uk-position-relative uk-visible-toggle uk-light" uk-slideshow="min-height: 300; max-height: 500; ratio: 7:3; animation: push">
        <ul class="uk-slideshow-items">
            <li>
                <img src="https://photo-cdn.icons8.com/assets/previews/260/124b3164-98d2-4ca8-8168-ca6aa2b328581x.jpg" alt="" uk-cover>
            </li>
            <li>
                <img src="https://photo-cdn.icons8.com/assets/previews/260/124b3164-98d2-4ca8-8168-ca6aa2b328581x.jpg" alt="" uk-cover>
            </li>
            <li>
                <img src="https://photo-cdn.icons8.com/assets/previews/260/124b3164-98d2-4ca8-8168-ca6aa2b328581x.jpg" alt="" uk-cover>
            </li>
        </ul>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
    </div>
    <div class="uk-container">

        <h3>Hello it's a home page</h3>

        <div class="uk-child-width-1-3@m" uk-grid>
            <?php foreach ($articles as $article): ?>
                <div>
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top">
                            <img src="https://images.unsplash.com/photo-1553531889-6785c6bd1f43?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1900&q=80" alt="">
                        </div>
                        <div class="uk-card-body">
                            <h3 class="uk-card-title"><a href="/articles/<?= $article['id']; ?>">Media Top</a></h3>
                            <p><?= $article['content']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php require_once __DIR__ . "/../layouts/footer.view.php"; ?>