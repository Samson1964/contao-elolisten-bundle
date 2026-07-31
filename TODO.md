# FIDE-Elo-Listen ToDo

## Offene Aufgaben

* Frontend-Ausgabe nachrüsten: Topliste eines Monats, ewige Bestenliste,
  Toplisten mehrerer Monate und Statistik. Die alten Einträge dafür stehen
  auskommentiert in der Historie der `config.php` und verweisen auf ein
  `ContaoEloBundle`, das es nicht mehr gibt. Solange die Ausgabe fehlt,
  versprechen `composer.json` und `package-metadata.yml` mehr, als das Bundle
  kann.
* Import einmal mit der echten `players_list_xml.zip` der FIDE durchspielen
  (bisher nur mit einer nachgebauten Datei aus 50.000 Spielern verifiziert).

## Erledigt

* Kompatibiltät mit PHP8, sowie Contao 4.13/5.7 herstellen (0.2.0, verifiziert in
  `F:\Claude\contao-test` 5.7.7 und `F:\Claude\contao-test-413` 4.13.58)
* Analog des Wertungsportal-Bundles den XML-Import übernehmen, als Operation für
  die jeweilige Liste, nur Spieler mit Länderkennung GER, vorhandene Spieler
  überschreiben und fehlende löschen (0.3.0)
* In README ausführlich ergänzen wie das Bundle verwendet wird (0.3.0, ausführliche
  Import-Anleitung in `docs/import.md`)
