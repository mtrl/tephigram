<?php
/**
 * Loops through the remote files on the hangarcam and displays the most recent one along with a zero cache header
 */
$file_start  = 100;
$file_end    = 159;
$newest_file = array();

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
header( "Cache-Control: no-cache, must-revalidate" );
header( "Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
header( "Content-Type: image/jpeg;" );

echo file_get_contents( $newest_file['url'] );