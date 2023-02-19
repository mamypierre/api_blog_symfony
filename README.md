
# Symfony Clean Architecture

```
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
 Accept: */*
 Content-Length: 16
 {
 	"limit":100 // optional , default 5
 }
```

# get post
```
 GET /api/posts/6 HTTP/1.1
 Host: local.api.blog
 User-Agent: insomnia/2022.6.0
 Accept: */*
```