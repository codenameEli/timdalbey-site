<?php

if( ! class_exists('LDM_Utils') ){

    class LDM_Utils {

        public static function parse_link( $link ){

            $protocol = substr($link, 0, 4);

            if( $protocol !== 'http' ){

                $link = 'http://' . $link;
            }

            return $link;
        }

        // @param - string (url)
        // @return - bool (does this link represent an external link)
        public static function is_link_external( $link ){

            $external = false;
            $protocol = substr($link, 0, 7);

            if ( $protocol === 'http://' || $protocol === 'https:/' ) {

               // link starts with http:// or https:/ protocol, assume external
               $external = true;
               $site_url = site_url();

               if (
                   strlen($link) >= strlen($site_url)  // the $link is longer (or equal) to site_url, might be internal
                   &&
                   substr($link, 0, strlen($site_url)) == $site_url // the beginning of $link matches $site_url, definitely internal
               ) {
                   $external = false;
               }
           }

           return $external;
        }
    }
}