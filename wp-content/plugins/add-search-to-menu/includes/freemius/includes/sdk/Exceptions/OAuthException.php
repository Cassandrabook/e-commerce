<<<<<<< HEAD
<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

	if ( ! class_exists( 'Freemius_Exception' ) ) {
		exit;
	}

	if ( ! class_exists( 'Freemius_OAuthException' ) ) {
		class Freemius_OAuthException extends Freemius_Exception {
			public function __construct( $pResult ) {
				parent::__construct( $pResult );
			}
		}
	}
=======
<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

	if ( ! class_exists( 'Freemius_Exception' ) ) {
		exit;
	}

	if ( ! class_exists( 'Freemius_OAuthException' ) ) {
		class Freemius_OAuthException extends Freemius_Exception {
			public function __construct( $pResult ) {
				parent::__construct( $pResult );
			}
		}
	}
>>>>>>> 563758b0b932766c9198ed1d15a89162e06d488c
