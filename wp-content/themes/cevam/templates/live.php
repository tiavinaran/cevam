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
        <section id="no-live">Aucun Live pour le moment</section>
    </section>
</main>

<?php
get_footer();