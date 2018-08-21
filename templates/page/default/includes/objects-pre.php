<?php

foreach( $objectsOrder as $key => $value ) {

	switch( $key ) {

		case 'attributes': {

			if( $attributes && $attributesBeforeContent ) {

				include "$pageIncludes/attributes.php";
			}

			break;
		}
		case 'elements': {

			if( $elements && $elementsBeforeContent ) {

				include "$pageIncludes/elements.php";
			}

			break;
		}
		case 'widgets': {

			if( $widgets && $widgetsBeforeContent ) {

				include "$pageIncludes/widgets.php";
			}

			break;
		}
		case 'blocks': {

			if( $blocks && $blocksBeforeContent ) {

				include "$pageIncludes/blocks.php";
			}

			break;
		}
		case 'sidebars': {

			if( $sidebars && $sidebarsBeforeContent ) {

				include "$pageIncludes/sidebars.php";
			}

			break;
		}
	}
}
