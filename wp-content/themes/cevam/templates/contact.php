<?php
/*
  Template Name: Contact
 */

get_header();

$mapLink = trim(get_theme_mod('address-map'));
?>

<main id="main-section" data-template="contact">
    <section id="contact-container">
        <section id="map-container">
            <a id="map"<?php echo $mapLink != '' ? ' href="' . $mapLink . '" target="_blank"' : ''; ?>>
                <img src="<?php echo get_template_directory_uri() . '/assets/img/cevam-map.jpg'; ?>" alt="map" title="map" />
            </a>
            <section id="contact-info-list">
                <?php
                $infos = ['address', 'email', 'phone'];

                foreach ($infos as $name) {
                    $text = trim(get_theme_mod($name));

                    if ($text == '') {
                        continue;
                    }

                    $link = str_replace(' ', '', $text);

                    if ($name === 'address') {
                        $link = $mapLink;
                    } elseif ($name === 'email') {
                        $link = 'mailto:' . $link;
                    } elseif ($name === 'phone') {
                        $link = 'tel:' . $link;
                    }

                    echo '<a class="contact-info"' . ($link != '' ? ' href="' . $link . '" target="_blank"' : '') . '>';
                    require __DIR__ . '/../assets/img/' . $name . '.svg';
                    echo '<span>' . $text . '</span>';
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
                    $socialNetworks = ['facebook', 'youtube', 'tiktok', 'instagram', 'twitter', 'linkedin'];

                    foreach ($socialNetworks as $name) {
                        $link = trim(get_theme_mod($name));

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
