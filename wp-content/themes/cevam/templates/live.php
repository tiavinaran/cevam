<?php
/*
  Template Name: Live
 */

get_header();
?>

<main id="main-section" data-template="live">
    <h1>Live</h1>
    <section id="youtube-live">
        <iframe src="https://www.youtube.com/embed/live_stream?channel=<?php echo YOUTUBE_CHANNEL_ID; ?>&autoplay=1" frameborder="0" allowfullscreen allow="autoplay; encrypted-media"></iframe>
        <section id="no-live">
            <span>Aucun Live pour le moment</span>
            <a id="youtube-channel-link" href="https://www.youtube.com/@cevamnetwork" target="_blank">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/youtube.svg'; ?>" alt="play" title="Cevam network" />
            </a>
        </section>
    </section>
</main>

<?php
get_footer();