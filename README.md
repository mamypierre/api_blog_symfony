
# Symfony Clean Architecture

# require
    composer,
    "php": ">=8.1"
# init
```
git clone git@github.com:mamypierre/api_blog_symfony.git

Composer install

php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```

# get last_added
```
 GET /api/posts/last_added HTTP/1.1
 Host: your.host
 Content-Type: application/json
 Accept: application/json
 Content-Length: 16
 {
 	"limit":100 // optional , default 5
 }
```

# get post
```
 GET /api/posts/6 HTTP/1.1
 Host: your.host
 Accept: application/json
```