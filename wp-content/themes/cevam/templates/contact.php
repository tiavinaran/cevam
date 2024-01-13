<?php
/*
  Template Name: Contact
 */

get_header();
?>

<main id="main-section" data-template="contact">
    <section id="contact-container">
        <section id="map-container">
            <a id="map" href="https://www.google.com/maps/?cid=633700803472239723" target="_blank">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/cevam-map.jpg'; ?>" alt="map" title="map" />
            </a>
            <section id="contact-info-list">
                <?php
                $infos = [
                    'map' => ['text' => 'II I 50 Ter Ankadivato, Tanà 101', 'link' => 'https://www.google.com/maps/?cid=633700803472239723'],
                    'mail' => ['text' => 'salomon.cevam@moov.mg', 'link' => 'mailto:salomon.cevam@moov.mg'],
                    'phone' => ['text' => '+261 20 22 292 94', 'link' => 'tel:+261202229294']
                ];

                foreach ($infos as $name => $info) {
                    if (!is_array($info) || $info['text'] == '') {
                        continue;
                    }

                    echo '<a class="contact-info"' . ($info['link'] != '' ? ' href="' . $info['link'] . '" target="_blank"' : '') . '>';
                    require __DIR__ . '/../assets/img/' . $name . '.svg';
                    echo '<span>' . $info['text'] . '</span>';
                    echo '</a>';
                }
                ?>
            </section>
        </section>
        <section id="contact-form">
            <section id="contact-form-header">
                <h1>Contactez-nous</h1>
                <section id="social-network-links">
                    <?php
                    $links = [
                        'facebook' => 'https://www.facebook.com/cevamchurch',
                        'youtube' => 'https://www.youtube.com/@cevamnetwork',
                        'tiktok' => 'https://www.tiktok.com/@cevamnetwork',
                        'instagram' => 'https://www.instagram.com/cevamchurch',
                        'twitter' => 'https://twitter.com/cevamnetwork',
                        'linkedin' => 'https://www.linkedin.com/in/cevam-church-b7a7a71b2'
                    ];

                    foreach ($links as $name => $link) {
                        if ($link == '') {
                            continue;
                        }

                        echo '<a class="social-network-link" href="' . $link . '" target="_blank" title="' . $name . '">';
                        require __DIR__ . '/../assets/img/' . $name . '.svg';
                        echo '</a>';
                    }
                    ?>
                </section>
            </section>
            <section id="contact-form-content">
                <?php echo do_shortcode('[contact-form-7 id="2887f65"]'); ?>

                <section class="google-policy">This site is protected by reCAPTCHA and the Google
                    <a href="https://policies.google.com/privacy">Privacy Policy</a> and
                    <a href="https://policies.google.com/terms">Terms of Service</a> apply.
                </section>
            </section>
        </section>
    </section>
</main>

<?php
get_footer();
