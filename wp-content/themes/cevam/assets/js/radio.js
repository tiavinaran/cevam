var checkHash = '';
var songData = [];
var livePastTime = 0;
var liveOffset = 0;

$(function () {
    checkSong();

    setInterval(() => {
        if (!$('#current-song-live').hasClass('d-none') && !$('#current-song-play').hasClass('playing')) {
            liveOffset++;
        }
    }, 1000);

    $('#current-song-play').on('click', function () {
        const audio = document.getElementById('radio-stream');

        if ($(this).hasClass('playing')) {
            audio.pause();
            $(this).removeClass('playing');
            $('#current-song-live').removeClass('d-none');
        } else {
            audio.play();
            $(this).addClass('playing');

            if (checkHash === '') {
                checkSong(checkHash = 'played');
            }
        }
    });

    $('#current-song-live').on('click', function () {
        const audio = document.getElementById('radio-stream');

        if (audio.currentTime > 0) {
            livePastTime += audio.currentTime;
            audio.load();
        }

        if (audio.paused) {
            audio.play();
            $('#current-song-play').addClass('playing');
        }

        liveOffset = 0;

        updateSongData(songData.length > 0 ? songData[songData.length - 1].data : null);
        songData = [];

        $(this).addClass('d-none');
    });
});

function checkSong(hash = '') {
    if (hash !== checkHash) {
        return;
    }

    $.get('?song', function (rawData) {
        try {
            let needUpdateSongData = true;
            const jsonData = JSON.parse(rawData);

            if (hash === '') {
                needUpdateSongData = false;
                updateSongData(jsonData);
            } else if (songData.length == 0 || JSON.stringify(songData[songData.length - 1].data) !== JSON.stringify(jsonData)) {
                songData.push({
                    time: document.getElementById('radio-stream').currentTime + livePastTime + liveOffset,
                    data: jsonData
                });

                if ($('#current-song-live').hasClass('d-none')) {
                    needUpdateSongData = false;
                    updateSongData(jsonData);
                }
            }

            if (needUpdateSongData) {
                updateSongData();
            }
        } catch (e) {
            console.error(e);
        }
    })
    .always(function () {
        if (hash === checkHash) {
            setTimeout(() => {
                checkSong(hash);
            }, 15000);
        }
    });
}

function updateSongData(data = null) {
    if (!data) {
        const currentTime = document.getElementById('radio-stream').currentTime + livePastTime;
        let song = null;

        for (let i = songData.length - 1; i >= 0; i--) {
            if (songData[i].time < currentTime) {
                song = songData[i];
                break;
            }
        }

        if (song) {
            data = song.data;
        }
    }

    if (!data) {
        return;
    }

    $('#current-song-title').text(data.title);
    $('#current-song-title').attr('title', data.title);
    $('#current-song-artist').text(data.artist);
    $('body').css('--image-background', 'url(' + (data.cover || $('#current-song-cover-img').data('default')) + ')');
    $('#current-song-cover-img').attr('title', data.album != '' ? 'Album : ' + data.album : '');
    $('#current-song-cover-img').attr('src', $('#current-song-cover-img').data('default'));

    if (data.cover) {
        $('#current-song-cover-img').attr('src', data.cover);
    }
}
