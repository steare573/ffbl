<?php
function printpre_r($expression, $return = false){
	if($return){
		return "<pre>" . print_r($expression, $return) . "</pre>";
	}

	echo "<pre>";
	print_r($expression);
	echo "</pre>";
}