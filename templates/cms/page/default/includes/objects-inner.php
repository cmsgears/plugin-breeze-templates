<?php

foreach( $objectsOrder as $key => $value ) {

	switch( $key ) {

		case 'metas': {

			if( $metas && $metasWithContent ) {

				include "$defaultIncludes/attributes.php";
			}

			break;
		}
		case 'files': {

			if( $files && $filesWithContent ) {

				include isset( $fileIncludes ) ? "$fileIncludes/files.php" : "$defaultIncludes/files.php";
			}

			break;
		}
		case 'elements': {

			if( $elements && !$elementsBeforeContent && $elementsWithContent ) {

				include isset( $elementIncludes ) ? "$elementIncludes/elements.php" : "$defaultIncludes/elements.php";
			}

			break;
		}
		case 'widgets': {

			if( $widgets && !$widgetsBeforeContent && $widgetsWithContent ) {

				include isset( $widgetIncludes ) ? "$widgetIncludes/widgets.php" : "$defaultIncludes/widgets.php";
			}

			break;
		}
		case 'blocks': {

			if( $blocks && !$blocksBeforeContent && $blocksWithContent ) {

				include isset( $blockIncludes ) ? "$blockIncludes/blocks.php" : "$defaultIncludes/blocks.php";
			}

			break;
		}
		case 'sidebars': {

			if( $sidebars && !$sidebarsBeforeContent && $sidebarsWithContent ) {

				include "$defaultIncludes/sidebars.php";
			}

			break;
		}
	}
}
