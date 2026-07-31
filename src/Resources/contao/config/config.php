<?php

declare(strict_types=1);

/*
 * Dieses Bundle verwaltet FIDE-Elo-Listen in Contao 4.13 und Contao 5.
 *
 * @license LGPL-3.0-or-later
 */

/*
 * Backend-Modul
 *
 * Beide Tabellen gehören zum selben Modul, damit die globalen Operationen
 * "Spieler verwalten" und "Elo-Listen verwalten" zwischen ihnen wechseln
 * können; Contao lässt nur Tabellen zu, die im Modul eingetragen sind.
 */
$GLOBALS['BE_MOD']['content']['elolisten'] = array
(
	'tables'                  => array('tl_elolisten', 'tl_elolisten_spieler'),
	'icon'                    => 'bundles/contaoelolisten/images/icon.png'
);
