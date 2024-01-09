<?php
    if (isset($_GET['is_live'])) {
        echo is_live() ? 'YES' : 'NO';
        exit;
    }
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="author" content="Tiavina Ranaivoson">
    <meta name="copyright" content="<?php bloginfo('name'); ?>">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<?php
    $template = basename(get_page_template());
    $isDarkPage = $template === 'radio.php';
?>

<body class="loading<?php echo $isDarkPage ? ' is-dark' : ''; ?>"<?php echo isset($_SESSION['page_background']) && $_SESSION['page_background'] != '' ? ' style="--image-background: url(' . $_SESSION['page_background'] . ');"' : ''; ?>>
    <section id="page-loading">
        <div>
            <div class="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </section>
    <header id="main-header">
        <section id="menu-logo">
            <a href="/">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/logo-' . ($isDarkPage ? 'light' : 'dark') . '.svg'; ?>" alt="Logo" title="Logo" />
            </a>
        </section>
        <?php
        wp_nav_menu([
            'theme_location' => 'main-menu',
            'menu_id' => 'horizontal-menu',
            'container' => ''
        ]);
        ?>
        <section id="horizontal-language-switcher" class="language-switcher">
            <?php pll_the_languages(['dropdown' => 'horizontal', 'display_names_as' => 'slug', 'hide_if_empty' => 0]); ?>
        </section>
        <section id="vertical-menu-section">
            <section id="toggle-menu-container">
                <span id="toggle-menu-title">Menu</span>
                <div id="toggle-menu" class="hamburger-lines">
                    <span class="line line1"></span>
                    <span class="line line2"></span>
                    <span class="line line3"></span>
                </div>
            </section>
            <section id="menu-dim"></section>
            <section id="vertical-menu-container">
                <?php
                wp_nav_menu([
                    'theme_location' => 'main-menu',
                    'menu_id' => 'vertical-menu',
                    'container' => ''
                ]);
                ?>
                <section id="vertical-language-switcher" class="language-switcher">
                    <?php pll_the_languages(['dropdown' => 'vertical', 'display_names_as' => 'slug', 'hide_if_empty' => 0]); ?>
                </section>
            </section>
        </section>
    </header>