# Webseite mit Formular-Validation

## Projektbeschreibung

Dieses Programm enthält eine farblich abgestimmte Webseite, die responsiv mit dem Bootstrap-Framework gestaltet wurde. Die Seite nutzt verschiedene CSS-Stile und enthält Bilder, um das Design zu bereichern.

Ein zentrales Feature der Webseite ist ein Kontaktformular (`contact.php`), das eine Formular-Validierung mit jQuery und PHP implementiert. Dabei wird das Formular sowohl clientseitig (mit jQuery) als auch serverseitig (mit PHP) validiert, um sicherzustellen, dass alle Eingaben korrekt sind.

Um Nachrichten zu versenden, wird **PHP-Mailer** verwendet. Dieser sorgt dafür, dass die über das Kontaktformular abgeschickte Nachricht per E-Mail an den definierten Empfänger gesendet wird. Es werden **SMTP-Einstellungen** benötigt, um die E-Mail-Zustellung zu ermöglichen.

## Features

- Responsives Design mit Bootstrap
- Formular-Validierung des Kontaktformulars mit jQuery (clientseitig) und PHP (serverseitig)
- Versenden von Nachrichten über PHP-Mailer mit konfigurierbaren SMTP-Einstellungen
- Verwendung von CSS-Stilen und Bildern für das Design

## Technologien

- HTML
- CSS
- jQuery
- PHP
- Bootstrap
- PHP-Mailer

## Installation und Benutzung

1. **Repository klonen:**

   ```bash
   git clone https://github.com/deinBenutzername/webseite-mit-form-validation.git

2. **Projektverzeichnis wechseln**
   ```bash
   cd webseite-mit-form-validation

3. **Composer installieren** (falls noch nicht installiert):

   Lade Composer hier herunter und installiere es.

4. **PHP-Mailer installieren:**

   Verwende Composer, um die PHP-Mailer-Bibliothek zu installieren:
   ```bash
   composer require phpmailer/phpmailer

5. **Abhängigkeiten installieren:**

   Führe den folgenden Befehl aus, um alle benötigten Abhängigkeiten zu installieren:
   ```bash
   composer install

6. **SMTP-Konfiguration anpassen:**
   
   **SMTP-Benutzername:** Öffne die Datei `username.php` und trage deinen SMTP-Benutzernamen ein.
   **SMTP-Passwort:** Öffne die Datei `password.php` und trage dein SMTP-Passwort ein.
   **SMTP-Server und Port:** Überprüfe, ob der SMTP-Server (z. B. `smtp.gmail.com`) und der Port (z. B. `587`) korrekt sind.
   *Hinweis:* Wenn du Gmail verwendest, aktiviere die 2-Faktor-Authentifizierung und erstelle ein App-Passwort für den Zugriff auf dein Konto.

7. **Projekt testen:**

   Öffne `contact.php` in deinem Browser, um das Kontaktformular anzuzeigen.
   Fülle das Formular aus und klicke auf "Senden".
   Nach korrekter Validierung wird die Nachricht über PHP-Mailer an den definierten Empfänger gesendet.
   
