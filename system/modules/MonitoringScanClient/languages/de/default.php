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
 * Error messages
 */
$GLOBALS['TL_LANG']['ERR']['monitoringScanClient']['CURL_NOT_INSTALLED'] = 'Zum Lesen von Daten über die API aus dem MonitoringClient ist cURL erforderlich. Bitte wenden Sie sich an Ihren Serveradministrator, um cURL auf Ihrem System zu installieren.';
$GLOBALS['TL_LANG']['ERR']['monitoringScanClient']['FAILED']             = 'Es können keine Daten aus vom MonitoringClient dieses überwachten Systems gelesen werden. Möglicherweise stimmt die API-URL nicht oder der Client sendet ein ungültiges Datenformat.<br/><br/>Öffnen Sie die folgende URL, um die Antwort zu überprüfen: <a href="%s" target="_blank">%s</a>';
$GLOBALS['TL_LANG']['ERR']['monitoringScanClient']['TOKEN_INVALID']      = 'Die Authentifizierung ist fehlgeschlagen, weil das Token ungültig war.';

?>