<?php
/*
  Template Name: Home
 */

get_header();
?>

<main id="main-section" data-template="home">
    <section id="welcome-section">
        <section id="church-caroussel" class="swiper">
            <section class="swiper-wrapper">
                <?php
                $churchMedias = [];

                foreach ($churchMedias as $media) {
                    if ($media['link'] == '') {
                        continue;
                    }

                    $mime = is_file($media['filepath']) ? mime_content_type($media['filepath']) : '';
                    $isVideo = strpos($mime, 'video/') !== false;

                    echo '
                        <article class="swiper-slide">
                            ' . ($isVideo ? '
                                <video class="swiper-media" playsinline="" autoplay="autoplay" loop="loop" autobuffer="autobuffer" muted="muted">
                                    <source src="' . $media['link'] . '" type="' . $mime . '">
                                </video>
                            ' : '
                                <img class="swiper-media" src="' . $media['link'] . '" alt="' . $media['title'] . '" loading="lazy" title="" />
                                <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                            ') . '
                        </article>
                    ';
                }
                ?>
            </section>
            <div class="swiper-pagination"></div>

            <h1>
                <span>Cevam Church</span>
                <small>Welcome Home</small>
            </h1>
        </section>
    </section>
    <section id="about-section" class="home-section">
        <h2 id="about-section-title" class="home-section-title">Cevam a été fondée en 1996</h2>
        <p id="about-section-content" class="home-section-content">
            L'église CEVAM s'est développée, avec l'enseignement chrétien évangélique, la vie dans l'Esprit, et cet accent sur l'excellence, la louange, la bonté de Dieu. Nous nous sommes agrandis et dans nos locaux actuels, tout neufs, que nous avons pu payer sans faire de dettes, nous pouvons accueillir des centaines de personnes dans des conditions excellentes, pour la gloire de Dieu. Notre lieu de culte s'appelle le "Palais des louanges" pour honorer le Seigneur.
            <a id="about-section-goto" class="home-section-action" href="/about">Voir plus</a>
        </p>
    </section>
    <section id="event-section" class="home-section">
        <h2 id="event-section-title" class="home-section-title">Events</h2>
        <section id="event-caroussel" class="swiper" style="--is-coming-text: 'à venir'">
            <section class="swiper-wrapper">
                <?php
                $events = [];

                function order_by_is_coming($a, $b)
                {
                    return $a['is_coming'] && !$b['is_coming'] ? -1 : (!$a['is_coming'] && $b['is_coming'] ? 1 : 0);
                }

                usort($events, 'order_by_is_coming');

                foreach ($events as $event) {
                    echo '
                        <a class="swiper-slide"' . ($event['link'] != ' href="' . $event['link'] . '" target="_blank"' ? '' : '') . ' style="--event-background: url(' . $event['cover'] . ');">
                            <section class="event-details' . ($event['is_coming'] ? ' is-coming' : '') . '">
                                <strong>' . $event['category'] . '</strong>
                                <h3>' . $event['title'] . '</h3>
                                <div>
                                    <p>' . $event['details'] . '</p>
                                    <span>Voir plus</span>
                                </div>
                            </section>
                        </a>
                    ';
                }
                
                if (count($events) > 0) {
                    echo '<article class="swiper-slide"></article>';
                }
                ?>
            </section>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </section>
    </section>
    <section id="rebroadcast-section" class="home-section">
        <h2 id="rebroadcast-section-title" class="home-section-title">Rediffusions</h2>
        <section id="rebroadcast-grid">
            <?php
            $videos = [];

            foreach ($videos as $video) {
                echo '
                    <a class="rebroadcast-video"' . ($video['link'] != ' href="' . $video['link'] . '" target="_blank"' ? '' : '') . ' style="--video-background: url(' . $video['cover'] . ');">
                        <img src="' . get_template_directory_uri() . '/assets/img/youtube.svg" alt="play" title="' . $video['title'] . '" />
                    </a>
                ';
            }
            ?>
        </section>
    </section>
    <section id="giving-section" class="home-section">
        <h2 id="giving-section-title" class="home-section-title">Donner</h2>
        <section id="giving">
            
        </section>
    </section>
</main>

<?php
get_footer();
