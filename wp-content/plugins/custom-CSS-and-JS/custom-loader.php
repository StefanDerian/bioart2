<?php
	/*
Plugin Name: Custom CSS and JS
Description: Custom Scripts Lister
Version: 3.4.0
Author: Stefan Derian
*/







	function enqueue_css_scripts(){
		wp_register_style('core-css',plugins_url('/css/custom-css.css',__FILE__));
		wp_enqueue_style('core-css');
	}
	function enqueue_js_scripts(){
		wp_register_script('my-js',plugins_url('/js/custom-js.js',__FILE__),array('jquery'));
		wp_enqueue_script('my-js');
	}
	add_action('wp_enqueue_scripts','enqueue_css_scripts');
	add_action('wp_enqueue_scripts','enqueue_js_scripts');