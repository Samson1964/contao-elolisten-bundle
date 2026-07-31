<?php

declare(strict_types=1);

/*
 * Dieses Bundle verwaltet FIDE-Elo-Listen in Contao 4.13 und Contao 5.
 *
 * @license LGPL-3.0-or-later
 */

namespace Schachbulle\ContaoElolistenBundle;

use Composer\InstalledVersions;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Haupt-Bundle-Klasse der FIDE-Elo-Listen.
 */
class ContaoElolistenBundle extends Bundle
{
	/**
	 * Prüft anhand der installierten Version, ob Contao 5 (oder neuer) läuft.
	 *
	 * Die DCA-Dateien brauchen diese Information, weil sich zwei Dinge zwischen
	 * den Hauptversionen unterscheiden: Contao 5 erwartet in "config.dataContainer"
	 * den vollqualifizierten Klassennamen (Contao 4.13 den Kurznamen "Table") und
	 * Contao 5 kennt die Kurzschreibweise der Operationen, bei der Label und Icon
	 * aus dem Kern kommen, während Contao 4.13 vollständige Arrays benötigt.
	 *
	 * Ausgewertet wird der Composer-Laufzeitindex und nicht die Konstante
	 * VERSION, da diese in Contao 5 entfallen ist.
	 *
	 * @return bool True bei Contao 5 oder neuer, false bei Contao 4.13 und
	 *              ebenso dann, wenn sich die Version nicht ermitteln lässt
	 */
	public static function isContao5(): bool
	{
		if (!class_exists(InstalledVersions::class))
		{
			return false;
		}

		return version_compare(
			(string) InstalledVersions::getVersion('contao/core-bundle'),
			'5.0.0',
			'>='
		);
	}
}
