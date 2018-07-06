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
 * Add to palette
 */
$arrDefaultPalletEntries = explode(";", $GLOBALS['TL_DCA']['tl_settings']['palettes']['default']);

foreach ($arrDefaultPalletEntries as $index=>$entry)
{
    if (strpos($entry, "{monitoring_legend}") !== FALSE)
    {
        $entry .= ",monitoringScanClientWorkerUpdateGooglemapsInstalledFormat";
        $arrDefaultPalletEntries[$index] = $entry;
    }
}

$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] = implode(";", $arrDefaultPalletEntries);

/**
 * Add fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['monitoringScanClientWorkerUpdateGooglemapsInstalledFormat'] = array
(
    'label'         => &$GLOBALS['TL_LANG']['tl_settings']['monitoringScanClientWorkerUpdateGooglemapsInstalledFormat'],
    'inputType'     => 'text',
    'eval'          => array('tl_class'=>'clr w50'),
    'load_callback' => array(array('tl_settings_MonitoringScanClientWorkerUpdateGooglemapsInstalled', 'generateDefaultFormat'))
);


/**
 * Class tl_settings_MonitoringScanClientWorkerUpdateContaoVersion
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @package     Monitoring
 * @author      trilobit GmbH <https://github.com/trilobit-gmbh>
 * @copyright   trilobit GmbH
 */
class tl_settings_MonitoringScanClientWorkerUpdateGooglemapsInstalled extends Backend
{
    /**
    * Import the back end user object
    */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Dynamically generate a token, if there is none
     * @param mixed
     * @param object
     * @return string
     */
    public function generateDefaultFormat($varValue, DataContainer $dc)
    {
        if (strlen($varValue) == 0)
        {
            $varValue = "Contao %s";
            \Config::persist('monitoringScanClientWorkerUpdateGooglemapsInstalledFormat', $varValue);
        }

        return $varValue;
    }
}