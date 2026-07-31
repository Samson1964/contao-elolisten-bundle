# FIDE-Elo-Listen für Contao

Verwaltet FIDE-Elo-Listen im Contao-Backend. Jede Liste entspricht einer
Monatsliste der FIDE und enthält die zugehörigen Spieler mit ihren Wertungszahlen
für klassisches Schach, Schnellschach und Blitzschach.

## Voraussetzungen ##

* PHP 7.4 oder neuer
* Contao 4.13 oder Contao 5

## Installation ##

Über den Contao Manager das Paket `schachbulle/contao-elolisten-bundle`
installieren oder auf der Kommandozeile:

```bash
composer require schachbulle/contao-elolisten-bundle
```

Anschließend die Datenbank aktualisieren (Contao Manager oder
`vendor/bin/contao-console contao:migrate`). Dabei werden die Tabellen
`tl_elolisten` und `tl_elolisten_spieler` angelegt.

## Verwendung ##

Im Backend erscheint unter **Inhalte** das Modul **Elo-Verwaltung**. Dort werden
die Listen angelegt und über die globale Operation **Spieler verwalten** die
zugehörigen Spieler gepflegt.

Eine ausführliche Anleitung folgt, sobald der FIDE-XML-Import und die
Frontend-Ausgabe fertig sind.

## Entwickler ##

**Frank Hoppe**
