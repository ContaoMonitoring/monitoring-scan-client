<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2018 Leo Feyer
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
 * @copyright  Cliff Parnitzky 2017-2018
 * @author     Cliff Parnitzky
 * @package    MonitoringScanClient
 * @license    LGPL
 */

/**
 * Add to palette
 */
$GLOBALS['TL_DCA']['tl_monitoring']['palettes']['__selector__'][] = "client_scan_active";
$GLOBALS['TL_DCA']['tl_monitoring']['palettes']['default'] .= ";{client_legend},client_scan_active";
$GLOBALS['TL_DCA']['tl_monitoring']['subpalettes']['client_scan_active'] .= "client_url,client_token,client_data";

/**
 * Add fields
 */
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['client_scan_active'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_monitoring']['client_scan_active'],
  'exclude'                 => true,
  'filter'                  => true,
  'inputType'               => 'checkbox',
  'eval'                    => array('tl_class'=>'clr', 'submitOnChange' => true, 'doNotCopy'=>true),
  'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['client_url'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_monitoring']['client_url'],
  'exclude'                 => true,
  'inputType'               => 'text',
  'save_callback'           => array(array('tl_monitoring', 'prepareUrl')),
  'eval'                    => array('tl_class'=>'clr long', 'mandatory'=>true, 'rgxp'=>'url', 'doNotCopy'=>true, 'maxlength'=>512, 'decodeEntities'=>true),
  'sql'                     => "varchar(512) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['client_token'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_monitoring']['client_token'],
  'exclude'                 => true,
  'inputType'               => 'text',
  'eval'                    => array('tl_class'=>'clr w50', 'doNotCopy'=>true, 'mandatory'=>true),
  'sql'                     => "varchar(255) NOT NULL default ''"
);
if (\Config::get('monitoringDebugMode') === TRUE)
{
  $GLOBALS['TL_DCA']['tl_monitoring']['fields']['client_data'] = array
  (
    'label'                   => &$GLOBALS['TL_LANG']['tl_monitoring']['client_data'],
    'exclude'                 => true,
    'inputType'               => 'textarea',
    'eval'                    => array('readonly'=>true, 'tl_class'=>'clr'),
    'load_callback'           => array(array('tl_monitoring_MonitoringScanClient', 'getClientData'))
  );
}

/**
 * Class tl_monitoring_MonitoringScanClient
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * PHP version 5
 * @copyright  Cliff Parnitzky 2017-2018
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class tl_monitoring_MonitoringScanClient extends Backend
{
  /**
   * Default constructor
   */
  public function __construct()
  {
    parent::__construct();
  }

  /** Get the json data from the client.
   *
   * @param mixed         $varValue
   * @param DataContainer $dc
   *
   * @return mixed
   */
  public function getClientData($varValue, DataContainer $dc)
  {
    if (!$dc->activeRecord || empty($dc->activeRecord->client_url) || empty($dc->activeRecord->client_token))
    {
      return "";
    }
    $monitoringScanClient = new \MonitoringScanClient();
    $response = $monitoringScanClient->scanClient($dc->activeRecord->client_url, $dc->activeRecord->client_token);
    if (is_array($response))
    {
      foreach($response as $responseKey=>$responseValue)
      {
        $varValue .= $responseKey . ": " . $responseValue . "\n";
      }
    }
    else
    {
      \Message::addError($response);
    }
    
    return $varValue;
  }
}

?>