# FIDE-Elo-Listen Changelog

## Version 0.1.1 (2026-07-29)

* Fix: Warning: Undefined array key "deleteConfirm", "importConfirm" bei contao:migrate -> Lesezugriffe auf $GLOBALS['TL_LANG'] in den DCA-Dateien mit `?? null` bzw. `?? array()` abgesichert, da der DcaLoader die Sprachdateien noch nicht geladen hat

## Version 0.1.0 (2024-04-17)

* Add: Abhängigkeit codefog/contao-haste
* Add: PHP-8-Unterstützung
* Add: Haste-Toggler

## Version 0.0.4 (2022-10-27)

* Fix: Bug in dca/tl_elolisten_spieler -> falscher Klassenname

## Version 0.0.3 (2022-10-27)

* Fix: Bug in dca/tl_elolisten_spieler

## Version 0.0.2 (2022-10-27)

* Fix: Bug in composer.json

## Version 0.0.1 (2022-10-27)

* Initiale Version als Contao-4-Bundle
