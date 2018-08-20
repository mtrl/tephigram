<?php
/**
 * Loops through the remote files on the hangarcam and displays the most recent one along with a zero cache header
 */
$file_start  = 100;
$file_end    = 159;
$newest_file = array();

// check cache status
$latest_hangarcam_image_log = 'latest_hangarcam_image.log';

//1. Get last modified date of cache file
//2. If last modified less than a minute ago, use the image logged in the file
$last_modified     = filemtime( $latest_hangarcam_image_log );

if (
	file_exists( $latest_hangarcam_image_log ) &&
	$last_modified + 60 > time()
) {
	$newest_file = array();
	$newest_file['url'] = file_get_contents( $latest_hangarcam_image_log );
} //3. Else, get the latest image file and log the name to the file
else {
	for ( $i = $file_start; $i <= $file_end; $i ++ ) {
		$url  = 'http://wv5cam.96.lt/testdir/photos/' . $i . '.jpg';
		$curl = curl_init();

		curl_setopt( $curl, CURLOPT_URL, $url );
		// Only header
		curl_setopt( $curl, CURLOPT_NOBODY, true );
		curl_setopt( $curl, CURLOPT_HEADER, true );
		// Do not print anything to output
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $curl, CURLOPT_FILETIME, true );

		$result = curl_exec( $curl );
		$info   = curl_getinfo( $curl );
		if ( ! isset( $newest_file['filetime'] ) || $info['filetime'] > $newest_file['filetime'] ) {
			$newest_file = $info;
		}
	}
	// Write the name to the log
	file_put_contents( $latest_hangarcam_image_log, $newest_file['url'] );
}


header( "Cache-Control: no-cache, must-revalidate" );
header( "Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
header( "Content-Type: image/jpeg;" );

echo file_get_contents( $newest_file['url'] );