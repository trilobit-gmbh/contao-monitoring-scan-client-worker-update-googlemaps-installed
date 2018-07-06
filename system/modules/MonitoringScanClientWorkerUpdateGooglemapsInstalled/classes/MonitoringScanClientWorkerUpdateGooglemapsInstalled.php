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

namespace Monitoring;

/**
 * Class MonitoringScanClientWorkerUpdateGooglemapsInstalled
 *
 * Contains functions to update the system field.
 * @package Monitoring
 *
 * @author trilobit GmbH <https://github.com/trilobit-gmbh>
 */
class MonitoringScanClientWorkerUpdateGooglemapsInstalled extends \Backend
{
    /**
    * Constructor
    */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Update the googlemaps field
     * @param $objMonitoringEntry
     * @param $response
     */
    public function updateGooglemapsInstalled($objMonitoringEntry, $response)
    {
        if (   in_array('MonitoringClientSensorGoogleMaps', explode(', ', $response['monitoring.client.sensors']))
            && !empty($response['googlemaps.installed'])
            && !empty($response['googlemaps.count'])
            && !empty($response['googlemaps.api'])
        )
        {
            foreach (array(
                         'installed' => 'googlemaps',
                         'count'     => 'googlemapsCount',
                         'api'       => 'googlemapsApi'
                     ) as $key => $value)
            {
                $strSystemEntry = $response['googlemaps.' . $key];

                if ($objMonitoringEntry->{$value} != $strSystemEntry)
                {
                    $objVersions = new \Versions('tl_monitoring', $objMonitoringEntry->id);

                    $this->import('BackendUser', 'User');

                    // for CRON based execution we need to set a system user
                    if (   empty($this->User->id)
                        || empty($this->User->username)
                    )
                    {
                        $objVersions->setUserId(0);
                        $objVersions->setUsername('ContaoMonitoringSystem');
                    }

                    $objVersions->initialize();

                    $objMonitoringEntry->{$value} = $strSystemEntry;
                    $objMonitoringEntry->save();

                    $objVersions->create();

                    $this->logDebugMsg("Updated the googlemaps.". $key ." field of monitoriong entry ID " . $objMonitoringEntry->id . " to '" . $strSystemEntry . "'.", __METHOD__);
                }
            }
        }
        else
        {
            $this->logDebugMsg("No Contao version for updating the googlemaps field of monitoriong entry ID " . $objMonitoringEntry->id . " transferred.", __METHOD__);
        }
    }

    /**
     * Logs the given message if the debug mode is anabled.
     *
     * @param $msg
     * @param $origin
     */
    private function logDebugMsg($msg, $origin)
    {
        if (\Config::get('monitoringDebugMode') === true)
        {
            $this->log($msg, $origin, TL_GENERAL);
        }
    }
}