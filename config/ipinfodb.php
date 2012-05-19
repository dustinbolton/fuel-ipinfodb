<?php
return array(

	/**
	 * Ipinfodb API key.
	 *
	 * Obtain by registering at http://www.ipinfodb.com/register.php
	 */
	'api_key'  => 'your_api_key',

	/**
	 * default_resolution - The default level of geolocation resolution to obtain if none is specified.
	 * 
	 * Valid options:
	 *		city		-	Highest precision. City / zipcode level.
	 *		country		-	Use if only country is needed; faster.
	 */
	'default_precision' => 'city',

);
