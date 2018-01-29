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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_monitoring']['client_scan_active'] = array('Read MonitoringClient data', 'Define whether the internal data of the monitored system should be read from the installed MonitoringClient.');
$GLOBALS['TL_LANG']['tl_monitoring']['client_url']         = array('MonitoringClient API URL', 'The address to the API of the MonitoringClient on the monitored system. Enter <u>with</u> protocol (for example http:// or https://)!');
$GLOBALS['TL_LANG']['tl_monitoring']['client_token']       = array('MonitoringClient token', 'The token of the MonitoringClient for authentication of the data query.');
$GLOBALS['TL_LANG']['tl_monitoring']['client_data']        = array('MonitoringClient data', 'Displays the internal data of the monitored system from the installed MonitoringClient.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_monitoring']['client_legend'] = 'MonitoringClient data';

?>