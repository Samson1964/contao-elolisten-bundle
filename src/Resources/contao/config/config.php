<?php

declare(strict_types=1);

/*
 * Dieses Bundle verwaltet FIDE-Elo-Listen in Contao 4.13 und Contao 5.
 *
 * @license LGPL-3.0-or-later
 */

use Schachbulle\ContaoElolistenBundle\Classes\FideImport;

/*
 * Backend-Modul
 *
 * Beide Tabellen gehören zum selben Modul: tl_elolisten_spieler ist die
 * Kindtabelle von tl_elolisten und wird über die Operation "Spieler der Liste
 * bearbeiten" geöffnet. Contao lässt dabei nur Tabellen zu, die hier
 * eingetragen sind.
 */
$GLOBALS['BE_MOD']['content']['elolisten'] = array
(
	'tables'                  => array('tl_elolisten', 'tl_elolisten_spieler'),
	'icon'                    => 'bundles/contaoelolisten/images/icon.svg',

	// Operation "FIDE-Daten importieren" am Listendatensatz (key=import&id=<Liste>).
	// Contao holt die Klasse über System::importStatic() aus dem Service-Container,
	// weil sie in der services.yaml unter ihrem Klassennamen registriert ist.
	'import'                  => array(FideImport::class, 'run')
);
