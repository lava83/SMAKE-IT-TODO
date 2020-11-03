# SMAKE IT TODO

## Installtion

Composer und PHP wird vorausgesetzt. 
Das Projekt auschecken:

```bash
$ composer create-project --prefer-dist lava83/smake-it-todo smake-it-todo
$ cd smake-it-todo
```

Nach dem das Projekt erstellt wurde, wird eine `.env` - Datei, aus der `.env.example`, kopiert..

In der `.env` Datei, die DB Einstellungen anpassen. Zum Beispiel:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smakeittodo
DB_USERNAME=root
DB_PASSWORD=rootpass
```

Sollte sqlite als Treiber genutzt werden, darauf achten, dass vor dem Ausführen der Migrationen gleich, die sqlite Datei erstellt wird, zum Beispiel, via:

```bash
$ touch database/database.sqlite
```

### Datenbank Migrationen

Zum Erstellen, der relevanten Datenbanktabelle, folgendes Kommando ausführen:

```bash
$ php artisan migrate
```

Über die Datenbank Seed, kann ein Beispiel User angelegt werden:

```bash
$ php artisan db:seed
```

Erstell einen User, mit folgenden Logindaten. Nutzername: `admin@smake.com`, Passwort: `pa55word!`

### Testserver starten

```bash
$ php artisan serve
```

Startet einen PHP internen Test Server. Die Weboberfläche ist dann über: http://localhost:8000 erreichbar.

### Unittests ausführen

Die Unittest können via:

```
$ php artisan test 
```

gestartet werden. 
