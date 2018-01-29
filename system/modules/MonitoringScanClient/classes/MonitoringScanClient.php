<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2017 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Cliff Parnitzky 2017-2017
 * @author     Cliff Parnitzky
 * @package    MonitoringScanClient
 * @license    LGPL
 */

/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace Monitoring;

/**
 * Class MonitoringScanClient
 *
 * Connect to a client and read the data.
 * @copyright  Cliff Parnitzky 2017-2017
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class MonitoringScanClient extends \Backend
{
  /**
   * Constructor
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Get the data from the client.
   */
  public function scanClient($clientUrl, $token)
  {
    if (!function_exists('curl_exec'))
    {
      return $GLOBALS['TL_LANG']['ERR']['monitoringScanClient']['CURL_NOT_INSTALLED'];
    }
    
    $url = $clientUrl . "?token=" . $token;
    
    $agent = \Config::get('MONITORING_AGENT_NAME');
    $headers = array(
        'Content-Type: application/json',
        'Connection: Close'
    );
    $curl = curl_init($url);

    if ($curl)
    {
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curl, CURLOPT_USERAGENT, $agent);
      curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

      $response = curl_exec ($curl);
      curl_close($curl);
    }
    
    $arrData = json_decode($response, true);
    
    if($response === FALSE || empty($arrData))
    {
        return sprintf($GLOBALS['TL_LANG']['ERR']['monitoringScanClient']['FAILED'], $url, $url);
    }
    if (count($arrData) == 1 && !empty($arrData['error']))
    {
      return $GLOBALS['TL_LANG']['ERR']['monitoringScanClient'][$arrData['error']];
    }

    return $arrData;
  }
}

?>