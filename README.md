Projekt-Nr. 12
# Master-Piece
## Inhalt
1. Beschreibung
2. Start
3. Sitemap
4. Struktur

## 1. Beschreibung
Ein (schweizer) Termin-Buchungssystem mit (Outlook-)Kalender-Integration
### Kontext und Auslöser
Die stetige Veränderung des Datenschutzes bereitet eine unsichere Lage, bezüglich ausländischen Anbietern
### Kunde
Webseiten-Erstellerinnen in der Schweiz (konkret eine Freundin)
### Benutzer
Selbständige, die ihre Termine online buchbar machen wollen, 
sowie deren Kundinnen Nutzen und Absicht.
Man ist nicht von einem amerikanischen Produkt abhängig. 
Sowohl wegen Integration (OptIn etc.), als auch Datenschutz.
### Tech Stack
Laravel (PHP) mit MySQL und Vue.js
### Hosting
Noch offen
### Spezialisierung
Vom Thema her ist der Schwerpunkt eher Backend

## 2. Start
### 2.1 Vorlage
Als Vorlage wurde das laravel-vue-auth Repository von Opportunity verwendet:
https://github.com/opportunity-zh/laravel-vue-auth.git
Das zugehörige Readme ist: README-laravel-vue-auth.md
### 2.2 Einschränkung
Da 'sail' scheinbar die falsche Gruppenzugehörigkeit (100999) hat und es Permission Probleme gibt, 
muss man statt 'sail artisan' 'php atisan' eingeben.
### 2.3 Bug
Das Login klappt nicht wegen "Error 405 method not allowed"
### 2.4 App starten
sudo netstat -laputen | grep "3306"
sudo netstat -laputen | grep ":80 "
#### oder kurz (lokal)
sudo ../ns
#### und dann
sudo kill pid1 pid2
sail up
npm run dev

## 3. Site-Map und Navigation
Die Site besteht aus 4 Pages:
Homepage, Terminwahl, Personalangaben und Bestätigungsseite.
Die Benutzerin hangelt sich mittels Button von einer Seite zur nächsten...

## 4. Struktur / Dateien
Zu programmieren sind folgende pages:
Home.vue, TerminWahl.vue, BuchungDetails.vue und BuchungErfolgreich.vue;
die Komponenten Header, Main und Footer enthalten.
### 3.1 Homepage
Auf der Landingpage eine kurze Beschreibung wer ich bin und ein call to action "Termin buchen"
### 3.2 Terminwahl
Auf der Terminseite zwei Komponenten mit einer Auswahl der Tage.
Und einer Auswahl der Zeiten, mit Button "weiter"
### 3.3 Personalien
Auf der Detailseite ein Formular, das alle Personalien erfasst; 
mit einem Button "buchen", der die Angaben in der Datenbank zwischenspeichert
und dann GANZ WICHTIG in den iCloud-Kalender schreibt.
### 3.4 Bestätigung
Eine kurze Meldung, dass alles geklappt hat mit "Home"-Button
Feature: Eine Bestätigung wird per E-Mail gesendet.
