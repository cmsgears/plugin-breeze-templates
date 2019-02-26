<?php
foreach( $objectsOrder as $key => $value ) {

	switch( $key ) {

		case 'attributes': {

			if( $attributes && !$attributesWithContent ) {

				include "$defaultIncludes/attributes.php";
			}

			break;
		}
		case 'elements': {

			if( $elements && !$elementsBeforeContent && !$elementsWithContent ) {

				include "$defaultIncludes/elements.php";
			}

			break;
		}
		case 'widgets': {

			if( $widgets && !$widgetsBeforeContent && !$widgetsWithContent ) {

				include "$defaultIncludes/widgets.php";
			}

			break;
		}
		case 'blocks': {

			if( $blocks && !$blocksBeforeContent && !$blocksWithContent ) {

				include "$defaultIncludes/blocks.php";
			}

			break;
		}
		case 'sidebars': {

			if( $sidebars && !$sidebarsBeforeContent && !$sidebarsWithContent ) {

				include "$defaultIncludes/sidebars.php";
			}

			break;
		}
	}
}
