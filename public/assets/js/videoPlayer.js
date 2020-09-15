$(function(){
    $('video').mediaelementplayer({
        startVolume:0.3,
        startLanguage:'en',
        defaultSeekBackwardInterval: function(media) {return (media.duration * 0.005);},
        defaultSeekForwardInterval: function(media) {return (media.duration * 0.005);}
    });
});