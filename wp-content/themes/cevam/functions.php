<?php

define('YOUTUBE_CHANNEL_ID', 'UCJb68TlSDhzzmE1ETDolmfA');

add_action('template_redirect', function () {
    $COOKIE_DURATION = 2678400; // 31 jours

    if (session_status() == PHP_SESSION_NONE) {
        ini_set('session.gc_maxlifetime', $COOKIE_DURATION);
        session_start();
        setcookie(session_name(), session_id(), time() + $COOKIE_DURATION);
    }
});

function import_scripts()
{
    wp_enqueue_style('animate', get_template_directory_uri() . '/lib/animate/4.1.1/animate.min.css', array(), '4.1.1');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/style.css', array(), '1.0');

    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/lib/jquery/3.5.1/jquery.min.js', array(), '3.5.1', true);

    wp_register_script('main-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
    wp_enqueue_script('main-script');

    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('classic-theme-styles');
    wp_dequeue_style('global-styles');

    $template = basename(get_page_template());

    if ($template === 'contact.php') {
        wp_enqueue_style('contact-style', get_template_directory_uri() . '/assets/css/contact.css', array(), '1.0');

        wp_register_script('contact-script', get_template_directory_uri() . '/assets/js/contact.js', array('jquery'), '1.0', true);
        wp_enqueue_script('contact-script');
    } else {
        wp_dequeue_script('contact-form-7');
        wp_dequeue_script('wpcf7-recaptcha');
        wp_dequeue_script('google-recaptcha');

        if ($template === 'home.php') {
            wp_enqueue_style('swiper-style', get_template_directory_uri() . '/lib/swiper/11.0.5/swiper.min.css', array(), '11.0.5');
            wp_enqueue_style('home-style', get_template_directory_uri() . '/assets/css/home.css', array(), '1.0');

            wp_register_script('swiper-script', get_template_directory_uri() . '/lib/swiper/11.0.5/swiper.min.js', array(), '11.0.5');
            wp_register_script('home-script', get_template_directory_uri() . '/assets/js/home.js', array('jquery', 'swiper-script'), '1.0', true);
            wp_enqueue_script('home-script');
        } elseif ($template === 'radio.php') {
            wp_enqueue_style('radio-style', get_template_directory_uri() . '/assets/css/radio.css', array(), '1.0');

            wp_register_script('radio-script', get_template_directory_uri() . '/assets/js/radio.js', array('jquery'), '1.0', true);
            wp_enqueue_script('radio-script');
        } elseif ($template === 'live.php') {
            wp_enqueue_style('live-style', get_template_directory_uri() . '/assets/css/live.css', array(), '1.0');
        } elseif ($template === 'about.php') {
            wp_enqueue_style('about-style', get_template_directory_uri() . '/assets/css/about.css', array(), '1.0');

            wp_register_script('about-script', get_template_directory_uri() . '/assets/js/about.js', array('jquery'), '1.0', true);
            wp_enqueue_script('about-script');
        } elseif ($template === 'podcast.php') {
            wp_enqueue_style('podcast-style', get_template_directory_uri() . '/assets/css/podcast.css', array(), '1.0');

            wp_register_script('podcast-script', get_template_directory_uri() . '/assets/js/podcast.js', array('jquery'), '1.0', true);
            wp_enqueue_script('podcast-script');
        }
    }
}
add_action('wp_enqueue_scripts', 'import_scripts', PHP_INT_MAX);

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

add_filter('wpcf7_load_css', '__return_false');

function footer_deregister_scripts()
{
    wp_deregister_script('wp-embed');
}
add_action('wp_footer', 'footer_deregister_scripts');

function initTheme()
{
    register_nav_menu('main-menu', 'Menu principal');
}
add_action('init', 'initTheme');

function custom_theme_data_config($wp)
{
    $wp->add_panel('contacts-panel', [
        'title' => 'Coordonnées & Réseaux sociaux'
    ]);

    // contacts section
    $wp->add_section('contacts-section', [
        'title' => 'Coordonnées',
        'panel' => 'contacts-panel'
    ]);

    $wp->add_setting('address', [
        'default' => ''
    ]);

    $wp->add_control('address-control', [
        'label' => 'Adresse',
        'type' => 'text',
        'section' => 'contacts-section',
        'settings' => 'address'
    ]);

    $wp->add_setting('address-map', [
        'default' => ''
    ]);

    $wp->add_control('address-map-control', [
        'label' => 'Lien adresse (Ex: google map)',
        'type' => 'text',
        'section' => 'contacts-section',
        'settings' => 'address-map'
    ]);

    $wp->add_setting('email', [
        'default' => ''
    ]);

    $wp->add_control('email-control', [
        'label' => 'Email',
        'type' => 'text',
        'section' => 'contacts-section',
        'settings' => 'email'
    ]);

    $wp->add_setting('phone', [
        'default' => ''
    ]);

    $wp->add_control('phone-control', [
        'label' => 'Téléphone',
        'type' => 'text',
        'section' => 'contacts-section',
        'settings' => 'phone'
    ]);

    // social networks section
    $wp->add_section('contacts-social-networks-section', [
        'title' => 'Réseaux sociaux',
        'panel' => 'contacts-panel'
    ]);

    $wp->add_setting('facebook', [
        'default' => ''
    ]);

    $wp->add_control('facebook-control', [
        'label' => 'Facebook',
        'type' => 'url',
        'section' => 'contacts-social-networks-section',
        'settings' => 'facebook'
    ]);

    $wp->add_setting('youtube', [
        'default' => ''
    ]);

    $wp->add_control('youtube-control', [
        'label' => 'Youtube',
        'type' => 'url',
        'section' => 'contacts-social-networks-section',
        'settings' => 'youtube'
    ]);

    $wp->add_setting('tiktok', [
        'default' => ''
    ]);

    $wp->add_control('tiktok-control', [
        'label' => 'Tiktok',
        'type' => 'url',
        'section' => 'contacts-social-networks-section',
        'settings' => 'tiktok'
    ]);

    $wp->add_setting('instagram', [
        'default' => ''
    ]);

    $wp->add_control('instagram-control', [
        'label' => 'Instagram',
        'type' => 'url',
        'section' => 'contacts-social-networks-section',
        'settings' => 'instagram'
    ]);

    $wp->add_setting('twitter', [
        'default' => ''
    ]);

    $wp->add_control('twitter-control', [
        'label' => 'Twitter',
        'type' => 'url',
        'section' => 'contacts-social-networks-section',
        'settings' => 'twitter'
    ]);

    $wp->add_setting('linkedin', [
        'default' => ''
    ]);

    $wp->add_control('linkedin-control', [
        'label' => 'Linkedin',
        'type' => 'url',
        'section' => 'contacts-social-networks-section',
        'settings' => 'linkedin'
    ]);

    $wp->add_panel('footer-panel', [
        'title' => 'Pied de page'
    ]);

    // footer section
    $wp->add_section('footer-section', [
        'title' => 'Pied de page'
    ]);

    $wp->add_setting('footer-text', [
        'default' => ''
    ]);

    $wp->add_control('footer-text-control', [
        'label' => 'Texte copyright',
        'type' => 'text',
        'section' => 'footer-section',
        'settings' => 'footer-text'
    ]);
}
add_action('customize_register', 'custom_theme_data_config');

function get_attachment_url_by_slug($slug)
{
    $args = [
        'post_type' => 'attachment',
        'name' => sanitize_title($slug),
        'posts_per_page' => 1,
        'post_status' => 'inherit',
    ];
    $attachments = get_posts($args);
    $media = is_array($attachments) && count($attachments) > 0 ? array_pop($attachments) : null;

    return $media ? wp_get_attachment_url($media->ID) : '';
}

function encrypt_string($string, $random = true)
{
    $iv = $random ? openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc')) : base64_decode('0pvKh2g1uOnXJws94lIe4A==');
    $encrypted = openssl_encrypt($string, 'aes-256-cbc', NONCE_KEY, 0, $iv);
    return urlencode(base64_encode($iv . $encrypted));
}

function decrypt_string($encryptedString)
{
    $data = base64_decode($encryptedString);
    $iv = substr($data, 0, openssl_cipher_iv_length('aes-256-cbc'));
    $decrypted = openssl_decrypt(substr($data, openssl_cipher_iv_length('aes-256-cbc')), 'aes-256-cbc', NONCE_KEY, 0, $iv);
    return $decrypted;
}

function get_relative_formatted_time($time)
{
    if ($time >= 60) {
        if ($time >= 3600) {
            if ($time >= 86400) {
                if ($time >= 604800) {
                    if ($time >= 2629800) {
                        if ($time >= 31557600) {
                            $value = (int)($time / 31557600);
                            return $value . ' an' . ($value > 1 ? 's' : '');
                        } else {
                            $value = (int)($time / 2629800);
                            return $value . ' mois';
                        }
                    } else {
                        $value = (int)($time / 604800);
                        return $value . ' semaine' . ($value > 1 ? 's' : '');
                    }
                } else {
                    $value = (int)($time / 86400);
                    return $value . ' jour' . ($value > 1 ? 's' : '');
                }
            } else {
                $value = (int)($time / 3600);
                return $value . ' heure' . ($value > 1 ? 's' : '');
            }
        } else {
            $value = (int)($time / 60);
            return $value . ' minute' . ($value > 1 ? 's' : '');
        }
    } else {
        $value = $time;
        return $value . ' seconde' . ($value > 1 ? 's' : '');
    }
}

function is_live()
{
    $ch = curl_init('https://www.youtube.com/channel/' . YOUTUBE_CHANNEL_ID . '/live');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $response = curl_exec($ch);
    $videoId = '';
    $status = ''; // OK | LIVE_STREAM_OFFLINE

    if (curl_errno($ch)) {
        // error: curl_error($ch);
    } else {
        $responseLength = strlen($response);
        $startLink = '<link rel="canonical" href="https://www.youtube.com/watch?v=';
        $startLinkLength = strlen($startLink);
        $startStatus = '"playabilityStatus":{"status":"';
        $startStatusLength = strlen($startStatus);

        for ($i = 0; $i < $responseLength; $i++) {
            if ($videoId == '') {
                $isFound = true;

                for ($s = 0; $s < $startLinkLength; $s++) {
                    if ($response[$i + $s] !== $startLink[$s]) {
                        $isFound = false;
                        break;
                    }
                }

                if ($isFound) {
                    $c = $i + $startLinkLength;

                    while ($response[$c] !== '"') {
                        $videoId .= $response[$c];
                        $c++;
                    }

                    $i = $c;
                }
            }

            if ($status == '') {
                $isFound = true;

                for ($s = 0; $s < $startStatusLength; $s++) {
                    if ($response[$i + $s] !== $startStatus[$s]) {
                        $isFound = false;
                        break;
                    }
                }

                if ($isFound) {
                    $c = $i + $startStatusLength;

                    while ($response[$c] !== '"') {
                        $status .= $response[$c];
                        $c++;
                    }

                    $i = $c;
                }
            }

            if ($videoId != '' && $status != '') {
                break;
            }
        }
    }

    curl_close($ch);

    return $videoId != '' && $status === 'OK';
}

function disable_ssp_generator_tag()
{
    return false;
}
add_filter('ssp_show_generator_tag', 'disable_ssp_generator_tag');

function update_podcast_player_dynamic_css($css)
{
    return preg_replace('/\.modern:not\(\.wide-player\) \.ppjs__audio-time-rail\s*\{[^}]*\}/', '{}', $css);
}
add_filter('podcast_player_dynamic_css', 'update_podcast_player_dynamic_css');

function custom_text($translated_text, $text, $domain)
{
    if ($domain === 'podcast-player') {
        $translations = [
            'Search Episodes' => 'Rechercher ...',
            'Load More' => 'Voir plus'
        ];

        return $translations[$text] ?? $translated_text;
    } elseif ($domain === 'seriously-simple-podcasting') {
        $translations = [
            'Share' => 'Partager',
            'Link' => 'Lien'
        ];

        return $translations[$text] ?? $translated_text;
    }

    return $translated_text;
}

add_filter('gettext', 'custom_text', 20, 3);