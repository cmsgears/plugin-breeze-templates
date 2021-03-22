<?php
if( $elements && $elementsBeforeContent ) {

	include isset( $elementIncludes ) ? "$elementIncludes/elements.php" : "$defaultIncludes/elements.php";
}

if( $widgets && $widgetsBeforeContent ) {

	include isset( $widgetIncludes ) ? "$widgetIncludes/widgets.php" : "$defaultIncludes/widgets.php";
}
