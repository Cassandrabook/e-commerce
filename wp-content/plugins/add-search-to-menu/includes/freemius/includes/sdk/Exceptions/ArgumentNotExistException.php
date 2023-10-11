<<<<<<< HEAD
<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

	if ( ! class_exists( 'Freemius_InvalidArgumentException' ) ) {
		exit;
	}

	if ( ! class_exists( 'Freemius_ArgumentNotExistException' ) ) {
		class Freemius_ArgumentNotExistException extends Freemius_InvalidArgumentException {
		}
	}
=======
<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

	if ( ! class_exists( 'Freemius_InvalidArgumentException' ) ) {
		exit;
	}

	if ( ! class_exists( 'Freemius_ArgumentNotExistException' ) ) {
		class Freemius_ArgumentNotExistException extends Freemius_InvalidArgumentException {
		}
	}
>>>>>>> 563758b0b932766c9198ed1d15a89162e06d488c
