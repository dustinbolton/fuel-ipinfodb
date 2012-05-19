<?php
/**
 * Ipinfodb Class
 *
 * Obtains geographical information from the Ip2info API by providing an IP address.
 *
 * @version		1.0.0
 * @package		Ipinfodb
 * @category	Package
 * @author		Dustin Bolton < http://dustinbolton.com >
 * @copyright	Copyright 2012 Dustin Bolton
 * @license		http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @link		https://github.com/dustinbolton/fuel-ipinfodb
 */

namespace Ipinfodb;


class Ipinfodb {


	/**
	 * Initialize by loading config
	 */
	public static function _init() {

		\Config::load( 'ipinfodb', true );
		$config = \Config::get( 'ipinfodb' );
		
		if ( empty( $config['api_key'] ) ) {
			throw new Ipinfodb_Exception( 'You must set the api_key configuration option.' );
		}

		if ( empty( $config['default_resolution'] ) ) {
			throw new Ipinfodb_Exception( 'You must set the default_precision configuration option.' );
		}

		if ( ( $config['default_precision'] != 'city' ) && ( $config['default_precision'] != 'country' ) ) {
			throw new Ipinfodb_Exception( 'You must set the default_precision configuration option as either city or country.' );
		}

	} // End _init().


	/**
	 * locate()
	 *
	 * Geolocate an IP address.
	 * Example usage: 
	 *		$results = Ipinfodb::locate( '127.0.0.1' );
	 *		echo '<pre>' . print_r( $results ) . '</pre>';
	 * Note: Only throws exception if called with missing or incorrect parameters.
	 *
	 * @param	string		$ip					IP address to geolocate.
	 * @param	string		$city_or_country	Location precision. If blank then default from config is used. Allowed values: city, country
	 * @return	array|false						Associataive array of geolocation data. boolean false if unable to connect or parse response.
	 */
	public static function locate( $ip, $city_or_country = '' ) {

		$config = \Config::get( 'ipinfodb' );

		if ( $city_or_country == '' ) { // No precision level specified, use default.
			$precision = $config['default_precision'];
		} elseif ( ( $city_or_country == 'city' ) || ( $city_or_country = 'country' ) ) { // Valid precision specified.
			$precision = $city_or_country;
		} else { // Invalid precision level.
			throw new Ipinfodb_Exception( 'Invalid precision level. Must be city or country.' );
		}

		// Generature API connection URL.
		$api_url = "http://api.ipinfodb.com/v3/ip-{$precision}/?key={$config['api_key']}&ip={$ip}&format=json";

		try { // Try to connect to API via curl driver. JSON response decoded into associative array.
			$response = json_decode( \Request::forge( $api_url, array( 'driver' => 'curl' ) )->execute()->response(), true );
		} catch ( \RequestException $e ) { // Failure.
			//Log::error( 'Unable to connect to Ioinfodb service API. Error: ' . $e->getMessage() );
			return false;
		}

		return $response;

	} // End locate().


} // End class Ipinfodb.


class Ipinfodb_Exception extends \Fuel_Exception {
}