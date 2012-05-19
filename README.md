# Fuel Ipinfodb Geolocation Package

A super simple IP Geolocation package using the Ipinfodb API for use with FuelPHP.

With this package and API you can obtain the country code, region name (state), city, zipcode, latitude, longitude, and timezone all in an easy to use associative array.

## About
* Version: 1.0.0
* Package: Ipinfodb
* Category: Package
* Author: Dustin Bolton < http://dustinbolton.com >
* Copyright: Copyright 2012 Dustin Bolton
* License: http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* Link: https://github.com/dustinbolton/fuel-ipinfodb

## Installation

### Git Submodule

If you are installing this as a submodule (recommended) in your git repo root, run this command:

	$ git submodule add git://github.com/dustinbolton/fuel-ipinfodb.git fuel/packages/ipinfodb

Then you you need to initialize and update the submodule:

	$ git submodule update --init --recursive fuel/packages/ipinfodb/

###Download

Alternatively you can download it and extract it into `fuel/packages/ipinfodb/`.

## Configuration

Configuration is easy. First thing you will need to do is to [register for your Ipinfodb API key](http://www.ipinfodb.com/register.php) (if you haven't already; it's free!).

Next, copy the `packages/ipinfodb/config/ipinfodb.php` from the package up into fuel's `app/config/` directory. Open it up and enter your API keys.

## Usage

The package must either be loaded by defining in your app's config.php -> always_load -> packages section as "ipinfodb" or manually loaded via `Package::load( 'ipinfodb' )`;

```php
$ip_address = Input::ip(); // IP address of visitor.
$response = Ipinfodb::locate( $ip_address ); // Geolocate.
echo '<pre>' . print_r( $response, true ) . '</pre>'; // Print out response array contents.
```

For more information about the API see [Ipinfodb API Documentation](http://www.ipinfodb.com/ip_location_api.php).

## Example Response
```
Array
(
    [statusCode] => OK
    [statusMessage] => 
    [ipAddress] => 98.168.135.100
    [countryCode] => US
    [countryName] => UNITED STATES
    [regionName] => OKLAHOMA
    [cityName] => EDMOND
    [zipCode] => 73003
    [latitude] => 35.6592
    [longitude] => -97.4547
    [timeZone] => -06:00
)
```

For more information about the API responses see [Ipinfodb API Documentation](http://www.ipinfodb.com/ip_location_api.php).

## Updates

In order to keep the package up to date simply run:

	$ git submodule update --recursive fuel/packages/ipinfodb/

## License

Copyright 2012 Dustin Bolton

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

	http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.