# FIDE-Elo-Listen für Contao

> ## ⚠️ Dieses Paket wird nicht mehr gepflegt
>
> Nachfolger ist **[schachbulle/contao-elo-bundle](https://github.com/Samson1964/contao-elo-bundle)**.
> Dort steckt derselbe Datenbestand samt XML-Import — zusätzlich aber die
> Frontend-Ausgabe (Toplisten, ewige Bestenliste, Statistik und das
> Inhaltselement), die es hier nie gab.
>
> Dieses Paket war eine Kopie des Datenteils des Elo-Bundles und ist nie
> produktiv eingesetzt worden. Wer es dennoch installiert hat, wechselt auf das
> Elo-Bundle; die Tabellen heißen dort `tl_elo_listen` und `tl_elo` statt
> `tl_elolisten` und `tl_elolisten_spieler`, die Felder sind identisch.

Verwaltet FIDE-Elo-Listen im Contao-Backend. Jede Liste entspricht einer
Monatsliste der FIDE und enthält die deutschen Spieler mit ihren Wertungszahlen
für klassisches Schach, Schnellschach und Blitzschach. Die Spieler werden aus der
XML-Ratingliste der FIDE importiert.

## Voraussetzungen ##

* PHP 7.4 oder neuer
* Contao 4.13 oder Contao 5

## Installation ##

Über den Contao Manager das Paket `schachbulle/contao-elolisten-bundle`
installieren oder auf der Kommandozeile:

```bash
composer require schachbulle/contao-elolisten-bundle
```

Anschließend die Datenbank aktualisieren — im Contao Manager über das
Install-Tool oder auf der Kommandozeile:

```bash
vendor/bin/contao-console contao:migrate
```

Dabei werden die beiden Tabellen `tl_elolisten` und `tl_elolisten_spieler`
angelegt.

## Aufbau ##

Das Bundle bringt ein Backend-Modul **Elo-Verwaltung** unter **Inhalte** mit. Es
verwaltet zwei Ebenen:

* **Elo-Listen** (`tl_elolisten`) — je Datensatz eine FIDE-Monatsliste
* **Spieler** (`tl_elolisten_spieler`) — die Spieler dieser Liste

Die Spieler sind Kinddatensätze der Liste. Sie gehören fest zu genau einer Liste
und werden zusammen mit ihr gelöscht.

## Listen anlegen ##

**Inhalte → Elo-Verwaltung → Neue Elo-Liste**. Eine Liste hat vier Felder:

| Feld | Bedeutung |
|---|---|
| **Monat** | Monat der Liste im Format `JJJJMM`, z. B. `202607`. Dient der internen Zuordnung und muss eindeutig gepflegt sein. |
| **Titel** | Überschrift der Liste, z. B. „Juli 2026" |
| **Datum** | Stichtag der Liste im Format `TT.MM.JJJJ` |
| **Veröffentlicht** | Schaltet die Liste an oder aus |

In der Übersicht sind die Listen absteigend nach Datum sortiert.

## Spieler pflegen ##

Die Spieler einer Liste erreicht man über die Operation **Spieler der Liste
bearbeiten**. Die Kopfzeile der Spieleransicht nennt Titel, Monat und Datum der
Liste, zu der die angezeigten Spieler gehören; über **Zurück** geht es in die
Listenübersicht.

Die Felder eines Spielers entsprechen den Spalten der FIDE-Ratingliste:
Personendaten (Name, Vorname, Titel wie „Dr.", Geburtsjahr, Geschlecht, Land),
FIDE-Daten (FIDE-ID und die vier Titelfelder), Markierungen (z. B. `i` für
inaktiv, je einmal für klassisch, Schnell- und Blitzschach) sowie die
Wertungszahlen und Partienzahlen der drei Bedenkzeiten.

In der Regel werden die Spieler nicht von Hand gepflegt, sondern importiert.

## FIDE-Daten importieren ##

Die Operation **FIDE-Daten importieren** an einer Liste übernimmt die
XML-Ratingliste der FIDE in genau diese Liste. Übernommen werden dabei
ausschließlich Spieler mit der Länderkennung `GER`; vorhandene Spieler der Liste
werden überschrieben und Spieler, die in der Datei fehlen, gelöscht.

Die ausführliche Anleitung samt Feldzuordnung, Serveranforderungen und Verhalten
bei einem Abbruch steht in **[docs/import.md](docs/import.md)**.

## Frontend-Ausgabe ##

Die Frontend-Module (Topliste, ewige Bestenliste, Statistik) sind in dieser
Version **noch nicht enthalten**. Das Bundle stellt derzeit nur die Verwaltung
und den Import bereit; die Ausgabe folgt in einer späteren Fassung.

## Entwicklung ##

Die Unit-Tests laufen mit PHPUnit 9:

```bash
vendor/bin/phpunit
```

Das Bundle führt bewusst kein eigenes `vendor/`-Verzeichnis mit; der
Test-Bootstrap kommt ohne Composer-Autoloader aus, wenn keiner vorhanden ist.

## Entwickler ##

**Frank Hoppe**
