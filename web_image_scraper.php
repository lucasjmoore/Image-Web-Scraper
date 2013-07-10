<?
/*Lucas*/
$webpage = file_get_contents('website_url_here');
$docObj = new DOMDocument(); 
$docObj->loadHTML($webpage);
$images = $docObj->getElementsByTagName('img');

foreach($images as $image) {
	//where the image is saved to
	$imageSrc ="http:".$image->getAttribute('src');
	$imageAlt =$image->getAttribute('alt');
	
	//only save the images that have names (alt attributes)
	if($imageAlt!= " " && $imageAlt != "" && $imageAlt !="/\s+/"){
		
		//renames the image (imageAlt) to fit naming file convention
		$imageAlt_fileSafe = preg_replace('/\s+/','_',$imageAlt);
		$imageAlt_fileSafe  = strtolower($imageAlt_fileSafe);
		
		//outputs image location and what the file name will be to the screen
		echo $imageSrc. ' = '.$imageAlt_fileSafe.'<br />';
		
		//save each image to folder
		$file_name = $imageAlt_fileSafe;
		//downloads the image - commented out to save bandwidth
		$img = '/Applications/MAMP/htdocs/website_images/'.$file_name.'.png';
		file_put_contents($img, file_get_contents($imageSrc));
	}
}
?>


