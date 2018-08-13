<?php

foreach( $objectsOrder as $key => $value ) {

	switch( $key ) {

		case 'attributes': {

			if( $attributes && !$attributesWithContent ) {

				include "$templateIncludes/attributes.php";
			}

			break;
		}
		case 'elements': {

			if( $elements && !$elementsWithContent ) {

				include "$pageIncludes/elements.php";
			}

			break;
		}
		case 'widgets': {

			if( $widgets && !$widgetsWithContent ) {

				include "$pageIncludes/widgets.php";
			}

			break;
		}
		case 'blocks': {

			if( $blocks && !$blocksWithContent ) {

				include "$pageIncludes/blocks.php";
			}

			break;
		}
		case 'sidebars': {

			if( $sidebars && !$sidebarsWithContent ) {

				include "$pageIncludes/sidebars.php";
			}

			break;
		}
	}
}
