define(function() {
    var MediaPlayerFactory = {
        getVideoPlayer: function(src) {
            return $("<div id='video_container'><video controls><source src='" + src + "' type='video/mp4'>Your browser does not support the video tag.</video></div>");
        },
        getAudioPlayer: function(src) {
            return $("<div id='audio_container'><audio controls><source src='" + src + "' type='audio/mp3'>Your browser does not support the audio tag.</audio></div>");
        },
        getPictureGallery: function(src) {
            return $("<img id='image_container'src='" + src + "' ></img>");
        }
    };
    return MediaPlayerFactory;
});
