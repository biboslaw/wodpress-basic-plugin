<?php

namespace WebWolf;

// use WebWolf\Services\RegisterTemplate as Register;

class App {

    /** @var WebWolf_engine $instance */
		public static $instance;

        

    public function __construct() {

        self::$instance = $this;

        add_action( 'plugins_loaded', [ $this, 'init' ], 100 );
    }

    /**
	 * Create and return instance
	 *
	 * @return WebWolf_engine
	 */
	public static function instance() {

		if ( self::$instance === null ) {

			self::$instance = new self();

		}

		return self::$instance;
	}

    public function init () {

        // Register::instance();

		/**
		 * register css and js scripts
		 */
		add_action( 'wp_enqueue_scripts', [ $this, 'registerScripts' ] );
		
    }

	public function registerScripts( ) {

		wp_enqueue_style(
			'webwolf-style',
			ASSETS . 'css/webwolf.css',
			[],
			null,
			false
		);

		wp_enqueue_script(
			'webwolf-js',
			ASSETS . 'js/webwolf.js',
			[],
			null,
			true
		);

		wp_localize_script( 'webwolf', 'wwData', [
			
		] );

	}

}