<?php
foreach( $objectsOrder as $key => $value ) {

	switch( $key ) {

		case 'elements': {

			if( $elements && $elementsBeforeContent ) {

				include isset( $elementIncludes ) ? "$elementIncludes/elements.php" : "$defaultIncludes/elements.php";
			}

			break;
		}
		case 'widgets': {

			if( $widgets && $widgetsBeforeContent ) {

				include isset( $widgetIncludes ) ? "$widgetIncludes/widgets.php" : "$defaultIncludes/widgets.php";
			}

			break;
		}
		case 'blocks': {

			if( $blocks && $blocksBeforeContent ) {

				include isset( $blockIncludes ) ? "$blockIncludes/blocks.php" : "$defaultIncludes/blocks.php";
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
