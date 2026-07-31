# FIDE-Elo-Listen Changelog

## Version 0.3.1 (2026-07-31)

* Change: Das Paket ist als abgelöst gekennzeichnet (`abandoned`). Nachfolger ist `schachbulle/contao-elo-bundle`, das denselben Datenbestand samt XML-Import mitbringt und zusätzlich die Frontend-Ausgabe enthält, die es hier nie gab

## Version 0.3.0 (2026-07-31)

* Add: FIDE-XML-Import als Operation an der einzelnen Liste (`key=import`). Übernommen werden ausschließlich Spieler mit der Länderkennung GER; vorhandene Spieler der Liste werden anhand der FIDE-ID überschrieben und Spieler, die in der Importdatei fehlen, gelöscht. Andere Listen bleiben unberührt
* Add: Der Import nimmt die gezippte Ratingliste der FIDE entgegen (ca. 50 MB statt 835 MB) und entpackt sie serverseitig
* Add: Upload und Import laufen in kleinen Schritten über AJAX, damit die rund 1,9 Millionen Datensätze der Weltrangliste nicht an Zeit- oder Speichergrenzen scheitern
* Add: Dokumentation des Imports in `docs/import.md`, README um eine vollständige Anleitung erweitert
* Add: Unit-Tests für die Auswertung eines `<player>`-Blocks (`tests/`, PHPUnit 9)

## Version 0.2.0 (2026-07-31)

* Add: Unterstützung für Contao 5 (getestet mit 5.7.7), Contao 4.13 bleibt unterstützt
* Change: `tl_elolisten_spieler` ist jetzt echte Kindtabelle von `tl_elolisten` (`ptable`/`ctable`, Ansichtsmodus 4). Die Spielerliste zeigt nur noch die Spieler der geöffneten Liste, in der Kopfzeile stehen Titel, Monat und Datum der Liste, und Contao löscht die Spieler beim Löschen der Liste mit
* Change: Die globalen Operationen "Spieler verwalten" und "Elo-Listen verwalten" sind entfallen; der Weg in die Spieler führt über die Operation "Spieler der Liste bearbeiten", der Weg zurück über die Contao-eigene Schaltfläche "Zurück"
* Change: Icons als SVG im Stil des Contao-Backends statt als PNG; das beseitigt die `exif_read_data(): File not supported`-Meldungen bei jedem Backend-Aufruf. `listen.png` ist ersatzlos entfallen, da die zugehörige Operation nicht mehr existiert
* Add: `declare(strict_types=1)` und deutsche Kommentarblöcke in allen PHP-Dateien
* Change: PHP-Anforderung auf `^7.4 || ^8.0` angehoben, die Unterstützung für PHP 5.6 und 7.0 bis 7.3 entfällt
* Change: Der Veröffentlichungs-Schalter in beiden Listen läuft jetzt über das Contao-eigene `act=toggle` statt über `haste_ajax_operation`
* Change: Operationsleisten werden versionsabhängig aufgebaut, da Contao 5 die Kurzschreibweise erwartet und Contao 4.13 vollständige Arrays
* Change: `dataContainer` verwendet den vollqualifizierten Klassennamen `Contao\DC_Table`, den Contao 4.13 seit 4.9 ebenfalls versteht
* Change: Operations-Icons von `.gif` auf `.svg` umgestellt, da Contao die GIF-Varianten nicht mehr ausliefert
* Change: `services.yml` in `services.yaml` umbenannt und der `_instanceof`-Block entfernt, der auf das in Symfony 7 entfallene `ContainerAwareInterface` verwies
* Remove: Abhängigkeit `codefog/contao-haste`, die für Contao 5 nicht verfügbar ist
* Remove: Abhängigkeit `schachbulle/contao-helper-bundle`, die im Bundle nirgends verwendet wurde
* Remove: Die leeren Klassen `tl_elolisten` und `tl_elolisten_spieler` aus den DCA-Dateien; sie erweiterten den in Contao 5 nicht mehr vorhandenen Klassen-Alias `Backend` und wurden von keinem Callback benutzt
* Fix: Die Operation "Spieler der Liste bearbeiten" verwies auf die nicht existierende Tabelle `tl_elo` statt auf `tl_elolisten_spieler`
* Fix: Rückfragetext `importConfirm` ergänzt, der bisher in der Sprachdatei fehlte und die Sicherheitsabfrage vor dem Import leer ließ

## Version 0.1.1 (2026-07-29)

* Fix: Warning: Undefined array key "deleteConfirm", "importConfirm" bei contao:migrate -> Lesezugriffe auf $GLOBALS['TL_LANG'] in den DCA-Dateien mit `?? null` bzw. `?? array()` abgesichert, da der DcaLoader die Sprachdateien noch nicht geladen hat
* Change: Beschreibung, Keywords und Homepage in der composer.json ergänzt, damit Packagist das Paket verständlich darstellt und über die Suche auffindbar macht

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
