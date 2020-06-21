# Modul WBD 5100 - Custom CMS

In diesem Modul wird eine Webseite erstellt, welche HTML, CSS, JS und PHP beinhaltet. Der Inhalt dieser Webseite soll mit einem CMS und dem CRUD-System bearbeitet werden.

Bei dieser Webseite Handelt es sich um einen Webblog. Der Webblog an sich ist neutral Designed. Der Inhalt soll zu der Richtung des Blogs beitragen. Der Blog enthält drei Ansichten: Public, Private und Admin.

- **Public** Sämtliche Benutzer haben darauf Zugriff und können den ungeschützten Inhalt sehen. Der Benutzer hat folgende möglichkeiten: Sich einzuloggen, einen Account zu erstellen und die Kontaktaufnahme per Kontaktformular.
- **Private** Nur für registrierte und angemeldete Benutzer. Der Benutzer kann Blog beiträge ansehen und kommentieren. Zusätzlich hat der Benutzer die möglichkeit sein Benutzerkonto folgendermassen zu bearbeiten: Passwort ändern, Benutzername ändern und das Benutzerkonto zu löschen. In der Ordnerstruktur mit `sec` gekennzeichnet.
- **Admin** Auf der Administrator-Seite hat nur der Administrator Zugriff. Der Administrator kann hier das CMS mit dem CRUD-System bedienen: Artikel hinzufügen, Artikel bearbeiten, Artikel löschen, Kommentare löschen, Unterseiten bearbeiten. Inhalt befindet sich in dem `/admin` Ordner.

## Setup

Um dieses Projekt zu öffnen/bearbeiten wird folgendes benötigt:

- MAMP oder XAMP o.ä um einen Lokalen Server zu Starten.
- PHP (Dieses Projekt wurde mit der Version 7.2 erstellt)
- Datenbank (.sql Datei befindet sich im ordner `/db`)

## PHP-Konzept

### Dynamischer Inhalt

Die Programmierstruktur bei diesem Projekt ist wie folgt: Es wird lediglich ein index.php (Name kan variieren) geladen welches die Grundstruktur der Webseite beibehält (Navigation, Footer, Aside etc...). Hauptsächlich ändert der `main` Part der Webseite, welche dynamisch mit GET-Parametern geladen wird. Hierbei bedient sich der GET-Parameter am `/layouts/html` ordner welche die dynamischen HTML-Templates beinhaltet. Diese werden anschliessend in den `main` Part der Webseite geladen. Die Dateien im `/html`-Ordner müssen zwingend mit der endung `.html.php` genannt werden, damit der GET-Parameter die Datei in das Dokument laden kann.

Tl;dr - Es ändert sich nur der `main` Part beim besuchen von Unterseiten.

### Funktionen und Scripts

Sämtliche Funktionen und Scripts sind, wenn möglich, getrennt von den `/layouts/html` zu halten. Dies fügt dazu bei dass Scripts und Layouts sauber getrennt sind, damit der Code modularer und überschaubarer wird. Die Scripts werden anschliessend per Include oder Require in die Dateien geladen.

#### Sicherheit

Die Sicherheit von SQL-Injection wurde per Prepared-Statements und `myslqli_real_escape_string`. Damit kein HTML-Code in die Webseite gelangt wurde eine Sanitize-Funktion erstellt welche den Globalen-Variabel `FILTER_SANITIZE_STRING` und die `trim()` funktion enthält.

## Datenbank

Der meiste Inhalt der Webseite befindet sich in der Datenbank, welcher anschliessend in das DOM geladen wird. Somit kann der Inhalt der Datenbank per CMS Bearbeitet werden, damit der Kunde den Inhalt der Webseite Individuell bearbeiten kann.

Momentan beinhaltet die Datenbank folgende Tabellen:

- **admin** beinhaltet die Login-Daten des Administrators.
- **comments** beinhaltet Kommentare zu den Artikeln. Die `comment_id` ist relational zu der `id` des Artikels `posts`.
- **page** beinhaltet Seiteninhalt.
- **posts** beinhaltet sämtliche Artikel des Blogs.
- **users** beinhaltet Benutzerkontos.

## CMS

Bei diesem CMS wird mit dem CRUD-System gearbeitet. Hiermit hat der Kunde vollen Zugriff auf die Inhalte, sofern es sinn macht . Das CMS manipuliert die Inhalte der Datenbank, welche anschliessend den Inhalt des Blogs ändert. Seiteninhalte, sowie Blogeinträge können bearbeitet werden. Bei grösseren Einträgen, welche formatierung brauchen wird per JavaScript der CKEditor geladen, mit dem der Kunde ein Interface hat welches dem von Microsoft Word ähnelt.

Das Design des CMS ist besonders auf die Benutzerfreundlichkeit ausgelegt. Das Design ist sehr minimalistisch gestaltet um möglichst übersichtlich zu sein.

Da es sich um einen Blog handelt, ist die meist gebrauchte Funktion das erstellen eines neuen Artikels. Dies erreicht der Kunde per Call-to-action schon bei der Startseite. Die Darstellung der Artikel ist im Kartenformat, welches den Titel, Intro-Text und das Bild des Artikels enthält. Nach erfolgreichem Bearbeiten/Löschen/Erstellen wird der Kunde auf eine Bestätigungsseite umgeleitet, damit der Kunde ein Userfeedback zu seinen änderungen erhält. Wenn der Kunde einen Inhalt löschen will, wird noch eine Bestätigungsseite geladen. Somit wird ein ungewolltes löschen eines Inhaltes verhindert.

Zusammengefasst kann der Kunde:

- Artikel erstellen
- Artikel bearbeiten
- Artikel löschen
- Unterseiten bearbeiten
- Kommentare löschen.
