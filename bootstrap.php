<?php
/**
 * Authored by Dustin Bolton < http://dustinbolton.com > 2012.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

Autoloader::add_core_namespace('Ipinfodb');

Autoloader::add_classes(array(
	'Ipinfodb\\Ipinfodb' => __DIR__.'/classes/ipinfodb.php',
));
