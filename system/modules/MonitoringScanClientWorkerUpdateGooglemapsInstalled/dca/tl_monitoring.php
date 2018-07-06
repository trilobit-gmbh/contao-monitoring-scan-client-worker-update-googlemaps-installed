<?php

// Insert google maps into listview
$strShowAfterwards = 'website';

array_splice(
    $GLOBALS['TL_DCA']['tl_monitoring']['list']['label']['fields'],
    array_search($strShowAfterwards, $GLOBALS['TL_DCA']['tl_monitoring']['list']['label']['fields']),
    1,
    array
    (
        $strShowAfterwards,
        'googlemaps',
        'googlemapsCount',
        'googlemapsApi',
    )
);

// add palette in detailview
$GLOBALS['TL_DCA']['tl_monitoring']['palettes']['default'] = str_replace
(
    ';{test_legend}',
    ';{googlemapssensor_legend},googlemaps,googlemapsCount,googlemapsApi;{test_legend}',
    $GLOBALS['TL_DCA']['tl_monitoring']['palettes']['default']
);

// field
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['googlemaps'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_monitoring']['googlemaps'],
    'exclude'   => true,
    'search'    => true,
    'filter'    => true,
    'sorting'   => true,
    'inputType' => 'select',
    'default'   => Monitoring::STATUS_UNTESTED,
    'options'   => array(Monitoring::STATUS_UNTESTED, Monitoring::STATUS_OKAY, Monitoring::STATUS_ERROR),
    'reference' => &$GLOBALS['TL_LANG']['tl_monitoring']['statusTypes'],
    'eval'      => array('tl_class'=>'w50', 'readonly'=>true, 'helpwizard'=>true, 'doNotCopy'=>true),
    'sql'       => "varchar(64) NOT NULL default '" . Monitoring::STATUS_UNTESTED . "'"
);

$GLOBALS['TL_DCA']['tl_monitoring']['fields']['googlemapsCount'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_monitoring']['googlemapsCount'],
    'exclude'   => true,
    'search'    => true,
    'filter'    => true,
    'sorting'   => true,
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'w50', 'readonly'=>true, 'doNotCopy'=>true),
    'sql'       => "int(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_monitoring']['fields']['googlemapsApi'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_monitoring']['googlemapsApi'],
    'exclude'   => true,
    'search'    => true,
    'filter'    => true,
    'sorting'   => true,
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'w50', 'readonly'=>true, 'doNotCopy'=>true),
    'sql'       => "blob"
);

/**
 * Class tl_monitoring_googlemaps
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @package     Monitoring
 * @author      trilobit GmbH <https://github.com/trilobit-gmbh>
 * @copyright   trilobit GmbH
 */
class tl_monitoring_googlemaps extends Backend
{
    /**
     * @param $row
     * @param DataContainer $dc
     * @param $args
     * @return mixed
     */
    public function getLabel($row, DataContainer $dc, $args)
    {
        $intPosGooglemaps = array_search('googlemaps', $GLOBALS['TL_DCA']['tl_monitoring']['list']['label']['fields']);

        $args[$intPosGooglemaps] = '<img src="system/modules/Monitoring/assets/status_' . strtolower($row['googlemaps']) . '.png"/>';

        return $args;
    }
}