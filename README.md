# Builder's guild

##Installation

```
composer install
yarn
./artisan key:generate
./artisan storage:link
cp env.example .env
```
Then create DB and User and fill .env (see MySQL docs)

###Create DB

```
./artisan migrate --seed
```

###Recreate DB
./artisan migrate:fresh --seed

The user is created with the --seed command,
The data for creation is taken from the file Database\Seeders\UserSeeder
```
Default users => [
     Admin => [
         phone => 777
         password => 1
     ],
     User => [
         phone => 888
         password => 2
     ]
 ]
```

## php config
### create .user.ini with
```
post_max_size = 70M
upload_max_filesize = 70M
```


## Weblate

### Microfost Azure translator
run in project root --to: ru, he, ar
```
i18n-auto-translation --apiProvider azure-rapid --key 772d2a181bmsh12fd8ecf7cedb25p16189ajsnefef85574235 --from en --to he -d ./resources/lang/Weblate/
```

### Start
- cd weblate-docker
- sudo docker compose up

### Update
- docker compose pull
- docker compose down
- docker compose up -d
- docker compose logs -f
