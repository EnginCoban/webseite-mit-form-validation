# Webseite mit Formular-Validierung

## Projektbeschreibung

Dieses Programm enthält eine farblich abgestimmte Webseite, die **responsiv** mit dem **Bootstrap-Framework** gestaltet wurde.

Ein **zentrales Feature** der Webseite ist ein Kontaktformular (`contact.php`), das eine **zweistufige Validierung** implementiert:  

- **Clientseitige Validierung**  

  Über das *jQuery Validation Plugin* ([jquery-validate.js](jquery-validate.js)) erhalten Nutzer direktes Feedback zu:  
  - Pflichtfeldern (E-Mail, Nachricht, Datenschutzerklärung)  
  - Korrektem E-Mail-Format  

- **Serverseitige Validierung** ([send-mail.php](send-mail.php))  
  - Eingabesäuberung mit PHP-Filtern (`FILTER_SANITIZE_EMAIL`, `FILTER_SANITIZE_SPECIAL_CHARS`)
  - Prüfen des E-Mail-Formats (`FILTER_VALIDATE_EMAIL`)   
  - Schutz vor Header-Injection durch Regex-Filterung von Zeilenumbrüchen
  - Benutzereingaben in der E-Mail mit `htmlspecialchars()` schützen 
  - Session-basierte Fehlerbehandlung für dauerhaft gepspeicherte Eingaben und Meldungen

Nach erfolgreicher Validierung wird die Nachricht über **PHPMailer mit SMTP** versendet. Die dafür erforderlichen SMTP-Zugangsdaten sind in externen Includes (`username.php`, `password.php`) ausgelagert.

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

   Lade Composer <a href="https://getcomposer.org/">hier</a> herunter und installiere es.

4. **PHP-Mailer installieren:**

   Verwende Composer, um die PHP-Mailer-Bibliothek zu installieren:
   ```bash
   composer require phpmailer/phpmailer

5. **Abhängigkeiten installieren:**

   Führe den folgenden Befehl aus, um alle benötigten Abhängigkeiten zu installieren:
   ```bash
   composer install

6. **SMTP-Konfiguration anpassen:**
   
   - Öffne die Datei `username.php` und trage deinen SMTP-Benutzernamen ein.
   - Öffne die Datei `password.php` und trage dein SMTP-Passwort ein.
   - Überprüfe, ob der SMTP-Server (z. B. `smtp.gmail.com`) und der Port (z. B. `587`) korrekt sind.
   *Hinweis:* Wenn du Gmail verwendest, aktiviere die 2-Faktor-Authentifizierung und erstelle ein App-Passwort für den Zugriff auf dein Konto.

7. **Projekt testen:**

   Öffne `contact.php` in deinem Browser, um das Kontaktformular anzuzeigen.
   Fülle das Formular aus und klicke auf "senden".
   Nach korrekter Validierung wird die Nachricht über PHP-Mailer an den definierten Empfänger gesendet.
   
