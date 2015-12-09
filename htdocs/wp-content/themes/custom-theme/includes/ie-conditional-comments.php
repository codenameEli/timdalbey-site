<?php

// Priority 15 ensures it runs after Genesis itself has setup.
add_action( 'genesis_setup', 'ldm_ie_conditional_comments_setup', 15 );
function ldm_ie_conditional_comments_setup() {

    remove_action( 'genesis_doctype', 'genesis_do_doctype' );

    add_action( 'genesis_doctype', 'ldm_conditional_comments' );
}

function ldm_conditional_comments() {

   ?>
		<!doctype html>
		<!--[if lt IE 7 ]> <html class="ie ie6 no-js" dir="ltr" lang="en-US"> <![endif]-->
		<!--[if IE 7 ]>    <html class="ie ie7 no-js" dir="ltr" lang="en-US"> <![endif]-->
		<!--[if IE 8 ]>    <html class="ie ie8 no-js" dir="ltr" lang="en-US"> <![endif]-->
		<!--[if IE 9 ]>    <html class="ie ie9 no-js" dir="ltr" lang="en-US"> <![endif]-->
		<!--[if gt IE 9]><!--><html class="no-js" dir="ltr" lang="en-US" ng-app="webApp" ng-cloak><!--<![endif]-->
		<?php /*
		 // add IE conditional comments to html element
		 // http://www.paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/
		 */ ?>
		<head profile="http://gmpg.org/xfn/11">
		<meta charset="UTF-8" />
   <?php
}
