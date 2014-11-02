/*
 * launchdm.youtubethumbs - jQuery Plugin
 * Change a text link to YouTube video to a YouTube thumbnail
 * adds <span class='playbutton'><!-- playbutton --></span> inside each a tag
 * adds class "youtube_item" to a single A tag YouTube link
 * adds class "youtube_list_js" to a ul containing a list of YouTube links
 *
 * Copyright (c) 2013 LaunchDM
 * 
 * Version: 1.0.8
 * Requires: jQuery v1.5.1+
 *
 * 1.0.8 added check for class .youtube_item_suppress_thumbnail, which prevents thumbnail and styling
 *          from being added to an element
 * 1.0.7 modified check for internal elements on link to ONLY check for internal image
 * 1.0.6 modified to process class .youtube_item_large_thumbnail for using large image size thumbnail
 *          refactored some selectors and variable initialization
 * 1.0.5 modified to avoid non-watch YouTube urls, e.g. www.youtube.com/user/launchdm
 * 1.0.4 modified to handle https and http youtube video links
 * 1.0.3 made youtube url parsing more robust with parseUrl method
 */
(function($) {


    $.fn.launchdmYouTubeThumbs = function(options) {
		var options = $.extend({}, $.fn.launchdmYouTubeThumbs.defaults, options);
        return this.each(function(key, value) {
            var $this = $(this),
                href = $this.attr('href') + 'yt:cc=on', // yt:cc=on adds in the Caption option
                video_name,
                video_image_url,
                restyle = true,
                thumbSize = options.thumbSize;

            if (
                typeof(href)=='string' 
                && (
                    href.substr(0, 28) == 'http://www.youtube.com/watch' ||  // http://www.youtube.com/watch?v=CMNr-Eo5i90
                    href.substr(0, 29) == 'https://www.youtube.com/watch'||  // http://www.youtube.com/watch?v=CMNr-Eo5i90
                    href.substr(0, 16) == 'http://youtu.be/'        ||  // http://youtu.be/CMNr-Eo5i90
                    href.substr(0, 17) == 'https://youtu.be/')          // http://youtu.be/CMNr-Eo5i90
                )
            {         
                // do NOT add thumbnail if there is an image inside this link (e.g. link already has a custom thumbnail)
                // do NOT add thumbnail if there is the class .youtube_item_suppress_thumbnail
                if ( 
                    // has internal images
                    $(this).find('img').length
                    ||
                    // has class .youtube_item_suppress_thumbnail
                    $(this).parent().hasClass('youtube_item_suppress_thumbnail')
                ) {
                    restyle = false;  
                }

                video_name = $.fn.launchdmYouTubeThumbs.parseUrl( href );

                if (restyle) {
                    // if determining video name fails, degrade gracefully, do not set background image to video thumbnail
                    if (video_name) {

                        if ( $this.hasClass('youtube_item_large_thumbnail') ) { thumbSize = 'large' }
                        video_image_url = "http://img.youtube.com/vi/" + video_name + "/"+(thumbSize == 'small' ? '2' : '0')+".jpg";
                        if (options.foreground) {
                            // insert thumbnail as foreground image
                            $this.prepend('<span class="image_frame"><img class="thumbnail" src="'+video_image_url+'" alt="Video Thumbnail" /></span>');
                        } else {
                            // insert thumbnail as background image
                            $this.css({
                                'background-image'    : 'url('+video_image_url+')'
                            });
                        }
                    } 
                    // add play button
                    $this.append("<span class='playbutton'><!-- playbutton --></span>");

                    // mark links with css classes for styling purposes
                    if ($this.parent().is('li')) {
                        // ul/li list of videos
                        $this.parent().parent().addClass('youtube_list_js').addClass('clearfix');
                    } else {
                        // individual link
                        $this.addClass('youtube_item');
                    }
                } // if restyle

                // callback (often used for click behavior)
                if (video_name) {
                    options.callback(this, video_name);
                }
            } // if www.youtube.com or youtu.be link

        }); // return this.each (for each element this plugin is operating on)

    }; //  launchdmYouTubeThumbs()

    // based on http://stackoverflow.com/questions/2936467/parse-youtube-video-id-using-preg-match
    $.fn.launchdmYouTubeThumbs.parseUrl = function(url) {
        var regExp = /(?:youtube(?:-nocookie)?\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i;
        var match = $.trim(url).match(regExp);
        if (match&&match[1].length==11){
            return match[1];
        }else{
            return false;
        }
    }; 

    $.fn.launchdmYouTubeThumbs.defaults = {
        thumbSize: 'small',
        foreground: true,
        callback: function(atag, youtubeid) {
            // default behavior, cause link to open in a new window
            $(atag).attr('target', '_blank');
        }
    }; // launchdmYouTubeThumbs().defaults
})(jQuery);
