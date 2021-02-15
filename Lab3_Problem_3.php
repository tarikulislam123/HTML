<?php
	$length=7;
	$width=7.5;
	if($length==$width) {
		echo "This shape is squre";
	}
	else{
		$area = $length * $width;
		echo "Area is " .$area;
		$perimeter = 2 * ($length + $width);
		echo "Perimeter is: " .$perimeter;
	}
?>