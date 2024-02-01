<?php
$isLargeFooter = basename(get_page_template()) === 'home.php';
$address = trim(get_theme_mod('address'));
$phone = trim(get_theme_mod('phone'));
?>
        <footer id="main-footer"<?php echo $isLargeFooter ? ' class="is-large" style="--footer-img: url(' . get_template_directory_uri() . '/assets/img/praising-blue.jpg)"' : ''; ?>>
            <?php if ($isLargeFooter) { ?>
                <section id="footer-contacts">
                    <section id="footer-address">
                        <strong>Visitez-nous</strong>
                        <?php echo $address != '' ? '<small>' . $address . '</small>' : ''; ?>
                        <?php echo $phone != '' ? '<small>' . $phone . '</small>' : ''; ?>
                    </section>
                    <section id="footer-social-links-container">
                        <strong>Suivez-nous</strong>
                        <section id="footer-social-links">
                            <?php
                                $socialNetworks = ['facebook', 'youtube', 'tiktok', 'instagram', 'twitter', 'linkedin'];

                                foreach ($socialNetworks as $name) {
                                    $link = trim(get_theme_mod($name));

                                    if ($link == '') {
                                        continue;
                                    }
    
                                    echo '
                                        <a class="footer-social-link" href="' . $link . '" target="_blank">
                                            <img src="' . get_template_directory_uri() . '/assets/img/' . $name . '.svg" alt="' . $name . '" title="' . $name . '" />
                                        </a>
                                    ';
                                }
                            ?>
                        </section>
                    </section>
                </section>
            <?php } ?>
            <p class="copyrights"><?php echo trim(get_theme_mod('footer-text')); ?></p>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
