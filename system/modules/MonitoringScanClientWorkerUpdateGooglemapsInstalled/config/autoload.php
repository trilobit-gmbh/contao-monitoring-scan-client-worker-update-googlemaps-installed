<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2017 Leo Feyer
 *
 * @license     LGPL-3.0-or-later
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
    'Monitoring',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
    // Classes
    'Monitoring\MonitoringScanClientWorkerUpdateGooglemapsInstalled' => 'system/modules/MonitoringScanClientWorkerUpdateGooglemapsInstalled/classes/MonitoringScanClientWorkerUpdateGooglemapsInstalled.php',
));
