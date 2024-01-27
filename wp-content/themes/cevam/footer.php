<?php
$isLargeFooter = basename(get_page_template()) === 'home.php';
?>
        <footer id="main-footer"<?php echo $isLargeFooter ? ' class="is-large" style="--footer-img: url(' . get_template_directory_uri() . '/assets/img/praising-blue.jpg)"' : ''; ?>>
            <?php if ($isLargeFooter) { ?>
                <section id="footer-contacts">
                    <section id="footer-address">
                        <strong>Visitez-nous</strong>
                        <small>II I 50 Ter Ankadivato, Tanà 101</small>
                        <small>+261 20 22 292 94</small>
                    </section>
                    <section id="footer-social-links-container">
                        <strong>Suivez-nous</strong>
                        <section id="footer-social-links">
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
            <p class="copyrights">&copy; CEVAM Church 2024 - Tous droits réservés</p>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
