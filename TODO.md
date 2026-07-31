# FIDE-Elo-Listen ToDo

## Offene Aufgaben

* Analog des Wertungsportal-Bundles den XML-Import übernehmen. Es wird dieselbe XML-Datei von der FIDE sein, die auch beim Wertungsportal-Bundle verwendet wird. Unterschied: Der Import soll in die jeweilige Liste erfolgen, also nicht als globale Operation sondern als Operation für die jeweilige Liste. Im Unterschied zum Wertungsportal-Bundle sollen nur Spieler mit Länderkennung GER importiert werden. Vorhandene Spieler der Liste, in die gerade importiert wird, werden überschrieben bzw. gelöscht, wenn diese im Import nicht vorhanden sind.
* In README ausführlich ergänzen wie das Bundle verwendet wird.

## Erledigt

* Kompatibiltät mit PHP8, sowie Contao 4.13/5.7 herstellen (0.2.0, verifiziert in
  `F:\Claude\contao-test` 5.7.7 und `F:\Claude\contao-test-413` 4.13.58)
