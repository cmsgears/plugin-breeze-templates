<?php
if( $elements && !$elementsBeforeContent ) {

	include "$defaultIncludes/elements.php";
}

if( $widgets && !$widgetsBeforeContent ) {

	include "$defaultIncludes/widgets.php";
}
