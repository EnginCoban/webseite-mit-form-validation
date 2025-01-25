# Webseite mit Formular-Validation

## Projektbeschreibung

Dieses Programm enthält eine **farblich abgestimmte Webseite**, die **responsiv** mit dem **Bootstrap-Framework** gestaltet wurde. Die Seite nutzt verschiedene **CSS-Stile** und enthält **Bilder**, um das Design zu bereichern.

Ein zentrales Feature der Webseite ist ein **Kontaktformular** (`contact.php`), das eine **Formular-Validierung** mit **jQuery** und **PHP** implementiert. Dabei wird das Formular sowohl clientseitig (mit jQuery) als auch serverseitig (mit PHP) validiert, um sicherzustellen, dass alle Eingaben korrekt sind.

Um Nachrichten zu versenden, wird **PHP-Mailer** verwendet. Dieser sorgt dafür, dass die über das Kontaktformular abgeschickte Nachricht per E-Mail an den definierten Empfänger gesendet wird. Es werden **SMTP-Einstellungen** benötigt, um die E-Mail-Zustellung zu ermöglichen.

## Features

- **Responsives Design** mit Bootstrap
- **Formular-Validierung** des Kontaktformulars mit jQuery (clientseitig) und PHP (serverseitig)
- **Versenden von Nachrichten** über PHP-Mailer mit konfigurierbaren SMTP-Einstellungen
- Verwendung von **CSS-Stilen** und **Bildern** für das Design

## Technologien

- HTML
- CSS
- jQuery
- PHP
- Bootstrap
- PHP-Mailer

## Installation und Benutzung

1. Klone dieses Repository:
   ```bash
   git clone https://github.com/deinBenutzername/webseite-mit-form-validation.git

2. Wechsle in das Projektverzeichnis:
   ```bash
   cd webseite-mit-form-validation

4. Stelle sicher, dass du Composer auf deinem System installiert hast. Falls nicht, kannst du es hier herunterladen und installieren: https://getcomposer.org/.

5. Installiere alle benötigten PHP-Abhängigkeiten mit Composer:
   ```bash
   composer install
    
6. Passe die Konfiguration für PHP-Mailer an. Öffne die Datei config.php und trage deine SMTP-Einstellungen ein (z.B. SMTP-Server, Port, Benutzername und Passwort).

7. Öffne contact.php im Browser, um das Kontaktformular anzuzeigen.

8. Fülle das Formular aus und klicke auf "senden". Wenn alle Pflichtfelder korrekt ausgefüllt sind, wird die Nachricht über PHP-Mailer an den definierten Empfänger gesendet.
   
