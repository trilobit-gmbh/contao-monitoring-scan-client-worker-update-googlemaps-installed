<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2017 Leo Feyer
 *
 * @package     Monitoring
 * @author      trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license     LGPL-3.0-or-later
 * @copyright   trilobit GmbH
 */

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['monitoringScanClientWork']['MonitoringScanClientWorkerUpdateGooglemapsInstalled'] = array('MonitoringScanClientWorkerUpdateGooglemapsInstalled', 'updateGooglemapsInstalled');

$GLOBALS['TL_HOOKS']['monitoringFormatList'][] = array('tl_monitoring_googlemaps', 'getLabel');

