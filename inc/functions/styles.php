<?php

function brightred_scripts() {
	wp_enqueue_style( 'brightred-style', get_stylesheet_uri(), array(), _S_VERSION );
}

add_action( 'wp_enqueue_scripts', 'brightred_scripts' );