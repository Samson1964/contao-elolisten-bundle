<?php

declare(strict_types=1);

/*
 * Dieses Bundle verwaltet FIDE-Elo-Listen in Contao 4.13 und Contao 5.
 *
 * @license LGPL-3.0-or-later
 */

use Contao\DC_Table;
use Schachbulle\ContaoElolistenBundle\ContaoElolistenBundle;

/**
 * Tabelle tl_elolisten_spieler
 *
 * Ein Datensatz entspricht einem Spieler einer FIDE-Monatsliste. Die Felder
 * bilden die Spalten der FIDE-XML-Datei ab; "pid" verweist auf die Liste in
 * tl_elolisten, zu der der Spieler gehört.
 */
$GLOBALS['TL_DCA']['tl_elolisten_spieler'] = array
(

	// Konfiguration
	'config' => array
	(
		// Contao 5 erwartet den vollqualifizierten Klassennamen; Contao 4.13 versteht
		// ihn seit 4.9 ebenfalls und verwarnt umgekehrt den Kurznamen "Table"
		'dataContainer'             => DC_Table::class,
		'enableVersioning'          => true,
		'sql' => array
		(
			'keys' => array
			(
				'id'                            => 'primary',
				'pid'                           => 'index',
				'fideid'                        => 'index',
				'surname'                       => 'index',
				'rating'                        => 'index',
				'games'                         => 'index',
				'rapid_rating'                  => 'index',
				'rapid_games'                   => 'index',
				'blitz_rating'                  => 'index',
				'blitz_games'                   => 'index',
				'pid,published,flag,sex,rating' => 'index'
			)
		)
	),

	// Datensätze auflisten
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1, // DataContainer::MODE_SORTED
			'fields'                  => array('surname'),
			'flag'                    => 1, // DataContainer::SORT_INITIAL_LETTER_ASC
			'headerFields'            => array('title', 'datum'),
			'panelLayout'             => 'sort,filter;search,limit',
		),
		'label' => array
		(
			'fields'                  => array('surname', 'prename'),
			'showColumns'             => true,
			'format'                  => '%s'
		),
		// global_operations und operations werden weiter unten versionsabhängig gesetzt
	),

	// Paletten
	'palettes' => array
	(
		'__selector__'                => array(''),
		'default'                     => '{name_legend},surname,prename,intent,birthday,sex,country;{fide_legend},fideid,title,w_title,o_title,foa_title;{flag_legend},flag,rapid_flag,blitz_flag;{elo_legend},rating,games,rapid_rating,rapid_games,blitz_rating,blitz_games;{publish_legend},published'
	),

	// Unterpaletten
	'subpalettes' => array
	(
		''                            => ''
	),

	// Felder
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'pid' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'fideid' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['fideid'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 16,
				'tl_class'            => 'w50'
			),
			'sql'                     => "int(16) unsigned NOT NULL default '0'"
		),
		'surname' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['surname'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 64,
				'tl_class'            => 'w50'
			),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'prename' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['prename'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 64,
				'tl_class'            => 'w50'
			),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'intent' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['intent'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 16,
				'tl_class'            => 'w50'
			),
			'sql'                     => "varchar(16) NOT NULL default ''"
		),
		'country' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['country'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 3,
				'tl_class'            => 'w50'
			),
			'sql'                     => "varchar(3) NOT NULL default ''"
		),
		'sex' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['sex'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 1,
				'tl_class'            => 'w50'
			),
			'sql'                     => "varchar(1) NOT NULL default ''"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['title'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 3,
				'tl_class'            => 'w50 clr'
			),
			'sql'                     => "varchar(3) NOT NULL default ''"
		),
		'w_title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['w_title'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 3,
				'tl_class'            => 'w50'
			),
			'sql'                     => "varchar(3) NOT NULL default ''"
		),
		'o_title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['o_title'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 3,
				'tl_class'            => 'w50'
			),
			'sql'                     => "varchar(3) NOT NULL default ''"
		),
		'foa_title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['foa_title'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 3,
				'tl_class'            => 'w50'
			),
			'sql'                     => "varchar(3) NOT NULL default ''"
		),
		'flag' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['flag'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 8,
				'tl_class'            => 'w50'
			),
			'sql'                     => "varchar(8) NOT NULL default ''"
		),
		'rapid_flag' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['rapid_flag'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 8,
				'tl_class'            => 'w50 clr'
			),
			'sql'                     => "varchar(8) NOT NULL default ''"
		),
		'blitz_flag' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['blitz_flag'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 8,
				'tl_class'            => 'w50 clr'
			),
			'sql'                     => "varchar(8) NOT NULL default ''"
		),
		'rating' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['rating'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 4,
				'tl_class'            => 'w50'
			),
			'sql'                     => "int(4) unsigned NOT NULL default '0'"
		),
		'games' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['games'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 4,
				'tl_class'            => 'w50'
			),
			'sql'                     => "int(4) unsigned NOT NULL default '0'"
		),
		'rapid_rating' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['rapid_rating'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 4,
				'tl_class'            => 'w50'
			),
			'sql'                     => "int(4) unsigned NOT NULL default '0'"
		),
		'rapid_games' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['rapid_games'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 4,
				'tl_class'            => 'w50'
			),
			'sql'                     => "int(4) unsigned NOT NULL default '0'"
		),
		'blitz_rating' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['blitz_rating'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 4,
				'tl_class'            => 'w50'
			),
			'sql'                     => "int(4) unsigned NOT NULL default '0'"
		),
		'blitz_games' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['blitz_games'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 4,
				'tl_class'            => 'w50'
			),
			'sql'                     => "int(4) unsigned NOT NULL default '0'"
		),
		'birthday' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['birthday'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 8,
				'tl_class'            => 'w50'
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['published'],
			'toggle'                  => true, // Aktiviert den Contao-eigenen Schnellschalter in der Übersicht
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array
			(
				'tl_class'            => 'w50',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
	)
);

/*
 * Operationen versionsabhängig setzen: Contao 5 kennt die Kurzschreibweise, bei
 * der Label und Icon aus dem Kern stammen, Contao 4.13 benötigt vollständige
 * Arrays. Der Toggler läuft in beiden Versionen über das Contao-eigene
 * "act=toggle"; die frühere Umsetzung über codefog/contao-haste ist entfallen,
 * weil Haste nicht für Contao 5 verfügbar ist.
 */
if (ContaoElolistenBundle::isContao5())
{
	$GLOBALS['TL_DCA']['tl_elolisten_spieler']['list']['global_operations'] = array
	(
		'listen' => array
		(
			'href'                => 'table=tl_elolisten',
			'icon'                => 'bundles/contaoelolisten/images/listen.png',
		),
		'all'
	);

	$GLOBALS['TL_DCA']['tl_elolisten_spieler']['list']['operations'] = array
	(
		'edit',
		'copy',
		'delete',
		'toggle',
		'show'
	);
}
else
{
	$GLOBALS['TL_DCA']['tl_elolisten_spieler']['list']['global_operations'] = array
	(
		'listen' => array
		(
			'label'               => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['listen'],
			'href'                => 'table=tl_elolisten',
			'icon'                => 'bundles/contaoelolisten/images/listen.png',
			'attributes'          => 'onclick="Backend.getScrollOffset();"'
		),
		'all' => array
		(
			'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
			'href'                => 'act=select',
			'class'               => 'header_edit_all',
			'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
		)
	);

	$GLOBALS['TL_DCA']['tl_elolisten_spieler']['list']['operations'] = array
	(
		'edit' => array
		(
			'label'               => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['edit'],
			'href'                => 'act=edit',
			'icon'                => 'edit.svg'
		),
		'copy' => array
		(
			'label'               => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['copy'],
			'href'                => 'act=copy',
			'icon'                => 'copy.svg'
		),
		'delete' => array
		(
			'label'               => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['delete'],
			'href'                => 'act=delete',
			'icon'                => 'delete.svg',
			'attributes'          => 'onclick="if(!confirm(\''.($GLOBALS['TL_LANG']['MSC']['deleteConfirm'] ?? '').'\'))return false;Backend.getScrollOffset()"'
		),
		'toggle' => array
		(
			'label'               => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['toggle'],
			'href'                => 'act=toggle&amp;field=published',
			'icon'                => 'visible.svg'
		),
		'show' => array
		(
			'label'               => &$GLOBALS['TL_LANG']['tl_elolisten_spieler']['show'],
			'href'                => 'act=show',
			'icon'                => 'show.svg'
		)
	);
}
