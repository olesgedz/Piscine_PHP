<?php
	print_r(gd_info());
	function gradient($image_width, $image_height,$c1_r, $c1_g, $c1_b, $c2_r, $c2_g, $c2_b, $vertical=false)
	{
		$name = "render";
	// first: lets type cast;
	$image_width = (integer)$image_width;
	$image_height = (integer)$image_height;
	$c1_r = (integer)$c1_r;
	$c1_g = (integer)$c1_g;
	$c1_b = (integer)$c1_b;
	$c2_r = (integer)$c2_r;
	$c2_g = (integer)$c2_g;
	$c2_b = (integer)$c2_b;
	$vertical = (bool)$vertical;
	// create a image
	$image  = imagecreatetruecolor($image_width, $image_height); 

	// make the gradient
	for($i=0; $i<$image_height; $i++) 
	{ 
	$color_r = floor($i * ($c2_r-$c1_r) / $image_height)+$c1_r;
	$color_g = floor($i * ($c2_g-$c1_g) / $image_height)+$c1_g;
	$color_b = floor($i * ($c2_b-$c1_b) / $image_height)+$c1_b;

	$color = ImageColorAllocate($image, $color_r, $color_g, $color_b);
	imageline($image, 0, $i, $image_width, $i, $color);
	} 
	print($image);
	// # Prints out all the figures and picture and frees memory 
	// header('Content-type: image/png'); 
	if($vertical){$image = imagerotate($image, 90, 0);}
		imagepng($image);
		$save = "./". strtolower($name) .".png";
		imagepng($image, $save);
	//imagewbmp($image, "./noice.bmp", NULL);
	//imagewbmp($image, 'simpletext.wbmp');
	imagedestroy($image); 
	}
	//gradient(700, 700, 5, 20, 17, 120, 213, 77, $vertical=false);
	$name = "render";



	$x = 200;
	$y = 200;

	$image = imagecreatetruecolor($x, $y);
	
	$corners[0] = array('x' => 100, 'y' =>  10);
	$corners[1] = array('x' =>   0, 'y' => 190);
	$corners[2] = array('x' => 200, 'y' => 190);

	$red = imagecolorallocate($image, 255, 0, 0); 

	for ($i = 0; $i < 100000; $i++) {
	imagesetpixel($image, round($x),round($y), $red);
	$a = rand(0, 2);
	$x = ($x + $corners[$a]['x']) / 2;
	$y = ($y + $corners[$a]['y']) / 2;
	}

	imagepng($image);
	$save = "./". strtolower($name) .".png";
	imagepng($image, $save);