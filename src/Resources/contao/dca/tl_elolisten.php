<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package   Elo
 * @author    Frank Hoppe
 * @license   GNU/LPGL
 * @copyright Frank Hoppe 2016
 */


/**
 * Table tl_elolisten
 */
$GLOBALS['TL_DCA']['tl_elolisten'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'                 => 'Table',
		'enableVersioning'              => true,
		'sql' => array
		(
			'keys' => array
			(
				'id'                    => 'primary',
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                      => 1,
			'fields'                    => array('datum'),
			'panelLayout'               => 'filter,sort;search,limit',
			'flag'                      => 12,
			'disableGrouping'           => true,
		),
		'label' => array
		(
			'fields'                    => array('id', 'listmonth', 'datum', 'title'),
			'showColumns'               => true,
			//'label_callback'          => array('tl_elolisten', 'convertDate')
		),
		'global_operations' => array
		(
			'spieler' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_elolisten']['spieler'],
				'href'                => 'table=tl_elolisten_spieler',
				'icon'                => 'bundles/contaoelolisten/images/spieler.png',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			),
			'all' => array
			(
				'label'                 => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                  => 'act=select',
				'class'                 => 'header_edit_all',
				'attributes'            => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'                 => &$GLOBALS['TL_LANG']['tl_elolisten']['edit'],
				'href'                  => 'table=tl_elo',
				'icon'                  => 'edit.gif',
			),
			'editheader' => array
			(
				'label'                 => &$GLOBALS['TL_LANG']['tl_elolisten']['editheader'],
				'href'                  => 'act=edit',
				'icon'                  => 'header.gif',
			),
			'copy' => array
			(
				'label'                 => &$GLOBALS['TL_LANG']['tl_elolisten']['copy'],
				'href'                  => 'act=copy',
				'icon'                  => 'copy.gif'
			),
			'delete' => array
			(
				'label'                 => &$GLOBALS['TL_LANG']['tl_elolisten']['delete'],
				'href'                  => 'act=delete',
				'icon'                  => 'delete.gif',
				'attributes'            => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'toggle' => array
			(
				'label'                => &$GLOBALS['TL_LANG']['tl_elolisten']['toggle'],
				'attributes'           => 'onclick="Backend.getScrollOffset()"',
				'haste_ajax_operation' => array
				(
					'field'            => 'published',
					'options'          => array
					(
						array('value' => '', 'icon' => 'invisible.svg'),
						array('value' => '1', 'icon' => 'visible.svg'),
					),
				),
			),
			'show' => array
			(
				'label'                 => &$GLOBALS['TL_LANG']['tl_elolisten']['show'],
				'href'                  => 'act=show',
				'icon'                  => 'show.gif'
			),
			'import' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_elolisten']['import'],
				'href'                => 'key=import',
				'icon'                => 'bundles/contaoelolisten/images/import.png',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['tl_elolisten']['importConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			), 
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                  => array(''),
		'default'                       => '{title_legend},listmonth,title,datum;{publish_legend},published'
	),

	// Subpalettes
	'subpalettes' => array
	(
		''                              => ''
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'label'                     => &$GLOBALS['TL_LANG']['tl_elolisten']['id'],
			'sql'                       => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                       => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                     => &$GLOBALS['TL_LANG']['tl_elolisten']['title'],
			'exclude'                   => true,
			'inputType'                 => 'text',
			'search'                    => true,
			'eval'                      => array
			(
				'mandatory'             => true,
				'maxlength'             => 64,
				'tl_class'              => 'w50 clr'
			),
			'sql'                       => "varchar(64) NOT NULL default ''"
		),
		'datum' => array
		(
			'label'                     => &$GLOBALS['TL_LANG']['tl_elolisten']['datum'],
			'exclude'                   => true,
			'default'                   => time(),
			'filter'                    => true,
			'search'                    => true,
			'inputType'                 => 'text',
			'flag'                      => 8,
			'eval'                      => array
			(
				'rgxp'                  => 'date',
				'datepicker'            => true,
				'mandatory'             => true,
				'maxlength'             => 10,
				'tl_class'              => 'w50 widget'
			),
			'sql'                       => "int(10) unsigned NOT NULL default '0'"
		),
		'listmonth' => array
		(
			'label'                     => &$GLOBALS['TL_LANG']['tl_elolisten']['listmonth'],
			'exclude'                   => true,
			'default'                   => date('Ym'),
			'filter'                    => true,
			'search'                    => true,
			'inputType'                 => 'text',
			'flag'                      => 11,
			'eval'                      => array
			(
				'mandatory'             => true,
				'maxlength'             => 6,
				'tl_class'              => 'w50'
			),
			'sql'                       => "int(6) unsigned NOT NULL default '0'"
		),
		'published' => array
		(
			'label'                     => &$GLOBALS['TL_LANG']['tl_elolisten']['published'],
			'exclude'                   => true,
			'search'                    => false,
			'sorting'                   => false,
			'filter'                    => true,
			'inputType'                 => 'checkbox',
			'eval'                      => array('tl_class' => 'w50','isBoolean' => true),
			'sql'                       => "char(1) NOT NULL default ''"
		),
	)
);


/**
 * Class tl_elolisten
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Leo Feyer 2005-2014
 * @author     Leo Feyer <https://contao.org>
 * @package    News
 */
class tl_elolisten extends Backend
{

	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

}
