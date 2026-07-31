# FIDE-Elo-Listen ToDo

## Abgelöst

Dieses Paket wird nicht mehr weiterentwickelt. Nachfolger ist
**schachbulle/contao-elo-bundle**; die offenen Punkte stehen dort in der
`TODO.md`.

Hintergrund: Dieses Repo war eine Kopie des Datenteils des Elo-Bundles
(identische Felder, umbenannte Tabellen) ohne dessen Frontend-Ausgabe. Die hier
in 0.2.0 und 0.3.0 entstandene Arbeit — Contao-5-Portierung, echte
Eltern-Kind-Beziehung, SVG-Icons und der FIDE-XML-Import — ist in das
Elo-Bundle übernommen worden und dort in 3.0.0 enthalten.

## Erledigt

* Kompatibiltät mit PHP8, sowie Contao 4.13/5.7 herstellen (0.2.0, verifiziert in
  `F:\Claude\contao-test` 5.7.7 und `F:\Claude\contao-test-413` 4.13.58)
* Analog des Wertungsportal-Bundles den XML-Import übernehmen, als Operation für
  die jeweilige Liste, nur Spieler mit Länderkennung GER, vorhandene Spieler
  überschreiben und fehlende löschen (0.3.0)
* In README ausführlich ergänzen wie das Bundle verwendet wird (0.3.0, ausführliche
  Import-Anleitung in `docs/import.md`)
