<?php

namespace LaunchPad\Utils;

class Utils {

    public static function parse_link( $link ){

        $protocol = substr( $link, 0, 4 );

        if( $protocol !== 'http' ){

            $link = 'http://' . $link;
        }

        return $link;
    }

    public static function link_is_external( $url ){

    	$url_host = parse_url( $url, PHP_URL_HOST );

    	return ( ! empty( $url_host ) || $url !== site_url() );
    }
}