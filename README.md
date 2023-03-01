
# Symfony Clean Architecture

# require
    "php": ">=8.1"
# init

```
git clone git@github.com:mamypierre/api_blog_symfony.git
```
# use docker

```
cd this_Root/Docker
docker-compose exec php composer update
docker-compose exec php bin/console doctrine:database:create
docker-compose exec php bin/console make:migration
docker-compose exec php bin/console doctrine:migrations:migrate
docker-compose exec php bin/console doctrine:fixtures:load
```
# get last_added use by docker
```
 curl --location --request GET 'http://localhost:8081/api/posts/last_added' \
--header 'Content-Type: application/json' \
--data '{
    "limit": 2
}'
```

# get post use by docker
```
  curl --location --request GET 'http://localhost:8081/api/posts/2' \
--header 'Content-Type: application/json' 
```



# use local env
```
composer update

php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```

# get last_added
limit : optional
```
  curl --location --request GET 'http://your.host/api/posts/last_added' \
--header 'Content-Type: application/json' \
--data '{
    "limit": 2
}'
```

# get post
```
 Accept: application/json
   curl --location --request GET 'http://your.host/api/posts/2' \
--header 'Content-Type: application/json' 
```