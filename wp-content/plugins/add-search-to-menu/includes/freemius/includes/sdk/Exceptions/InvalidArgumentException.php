<<<<<<< HEAD
<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

	if ( ! class_exists( 'Freemius_Exception' ) ) {
		exit;
	}

	if ( ! class_exists( 'Freemius_InvalidArgumentException' ) ) {
		class Freemius_InvalidArgumentException extends Freemius_Exception { }
	}
=======
<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

	if ( ! class_exists( 'Freemius_Exception' ) ) {
		exit;
	}

	if ( ! class_exists( 'Freemius_InvalidArgumentException' ) ) {
		class Freemius_InvalidArgumentException extends Freemius_Exception { }
	}
>>>>>>> 563758b0b932766c9198ed1d15a89162e06d488c
