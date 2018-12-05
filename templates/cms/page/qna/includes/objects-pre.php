<?php

foreach( $objectsOrder as $key => $value ) {

	switch( $key ) {

		case 'elements': {

			if( $elements && $elementsBeforeContent ) {

				include "$defaultIncludes/elements.php";
			}

			break;
		}
		case 'widgets': {

			if( $widgets && $widgetsBeforeContent ) {

				include "$defaultIncludes/widgets.php";
			}

			break;
		}
		case 'blocks': {

			if( $blocks && $blocksBeforeContent ) {

				include "$defaultIncludes/blocks.php";
			}

			break;
		}
		case 'sidebars': {

			if( $sidebars && $sidebarsBeforeContent ) {

				include "$defaultIncludes/sidebars.php";
			}

			break;
		}
	}
}
