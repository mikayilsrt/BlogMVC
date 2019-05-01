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
    <div class="container">
        <h1>Hello it's a home page</h1>
    </div>

<?php require_once __DIR__ . "/../layouts/footer.view.php"; ?>