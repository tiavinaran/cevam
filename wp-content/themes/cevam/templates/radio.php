<?php
/*
  Template Name: Radio
 */

function get_current_song()
{
    $ch = curl_init('https://api.radioking.io/widget/radio/cevam-radio-2/track/current');
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $response = curl_exec($ch);
    $return = '';

    if (curl_errno($ch)) {
        $return = 'Error: ' . curl_error($ch);
    } else {
        $data = json_decode($response, true);

        if (!$data) {
            $return = 'Failed to decode JSON response';
        } else {
            $return = [
                'title' => isset($data['title']) && $data['title'] != '' && (!isset($data['forced_title']) || !$data['forced_title']) ? $data['title'] : 'Cevam radio',
                'artist' => isset($data['artist']) && $data['artist'] != '' ? $data['artist'] : '',
                'album' => isset($data['album']) && $data['album'] != '' ? $data['album'] : '',
                'cover' => isset($data['cover']) && $data['cover'] != '' && (!isset($data['default_cover']) || !$data['default_cover']) ? $data['cover'] : ''
            ];
        }
    }

    curl_close($ch);

    return $return;
}

if (isset($_GET['song'])) {
    $data = get_current_song();

    if (is_array($data)) {
        echo json_encode($data);
        exit;
    }

    die($data);
}

$song = get_current_song();

if (!is_array($song)) {
    $song = [
        'title' => 'Cevam radio',
        'artist' => '',
        'album' => '',
        'cover' => ''
    ];
}

$_SESSION['page_background'] = $song['cover'] ?: get_template_directory_uri() . '/assets/img/cevam-radio.jpg';

get_header();
?>

<main id="main-section" data-template="radio">
    <h1>Cevam Radio</h1>
    <section id="current-song">
        <section id="current-song-cover">
            <img id="current-song-cover-img" src="<?php echo $_SESSION['page_background']; ?>" data-default="<?php echo get_template_directory_uri(); ?>/assets/img/cevam-radio.jpg" alt="album cover" title="<?php echo $song['album'] != '' ? 'Album : ' . $song['album'] : ''; ?>" />
        </section>
        <section id="current-singer">
            <div id="current-song-title" title="<?php echo $song['title']; ?>"><?php echo $song['title']; ?></div>
            <div id="current-song-artist"><?php echo $song['artist']; ?></div>
        </section>
        <section id="current-song-actions">
            <section id="current-song-play">
                <audio id="radio-stream" src="http://listen.radioking.com/radio/331132/stream/379453"></audio>
                <svg id="play-button" xmlns="http://www.w3.org/2000/svg" width="800" height="800" viewBox="-3 0 28 28" xmlns:v="https://vecta.io/nano">
                    <path d="M21.415 12.554L2.418.311C1.291-.296 0-.233 0 1.946v24.108c0 1.992 1.385 2.306 2.418 1.635l18.997-12.243c.782-.799.782-2.093 0-2.892" fill="currentColor" />
                </svg>
                <svg id="pause-button" xmlns="http://www.w3.org/2000/svg" width="800" height="800" viewBox="-4 0 28 28" xmlns:v="https://vecta.io/nano">
                    <path d="M18 0h-4a2 2 0 0 0-2 2v24a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h0zM6 0H2a2 2 0 0 0-2 2v24a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h0z" fill="currentColor" />
                </svg>
            </section>
            <section id="current-song-live" class="d-none" title="direct">
                <svg xmlns="http://www.w3.org/2000/svg" width="800" height="800" viewBox="0 0 24 24" xmlns:v="https://vecta.io/nano">
                    <path d="M5.99 4.929a.75.75 0 0 1 0 1.061 8.5 8.5 0 0 0 0 12.021.75.75 0 1 1-1.061 1.061c-3.905-3.905-3.905-10.237 0-14.142a.75.75 0 0 1 1.061 0zm13.081 0c3.905 3.905 3.905 10.237 0 14.142a.75.75 0 1 1-1.061-1.061 8.5 8.5 0 0 0 0-12.021.75.75 0 1 1 1.061-1.061zM8.818 7.757a.75.75 0 0 1 0 1.061 4.5 4.5 0 0 0 0 6.364.75.75 0 0 1-1.061 1.061 6 6 0 0 1 0-8.485.75.75 0 0 1 1.061 0zm7.425 0a6 6 0 0 1 0 8.485.75.75 0 1 1-1.061-1.061 4.5 4.5 0 0 0 0-6.364.75.75 0 0 1 1.061-1.061zM12 10.5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 1 1 0-3z" fill="currentColor" />
                </svg>
            </section>
        </section>
    </section>
</main>

<?php get_footer(); ?>