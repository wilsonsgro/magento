## site

http://local.magento.it/

https://local.magento.it/

```bash
wilson.sgro81@gmail.com
6gbMG0VUiHRxPhF
```

http://local.magento.it/admin

```bash
w.sgro81
PippoBaudo1234
```

## rabbit

http://local.magento.it:15672/

```bash
xl3kbe3755646 
UTj4dglHayyFeFzf
```

## commands docker

```bash
 docker compose exec php bash
 docker compose exec rabbitmq bash
 docker compose exec redis redis-cli flushall 
```
## create symbolic link php 

```bash
ln -s /usr/bin/php82 /usr/bin/php
```

## install composer

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

php composer-setup.php --version=2.2.21

cp composer.phar /usr/bin/composer
```

## install from compser.json

```bash
composer install --no-dev
```

## setup install empty project

```bash
php -dmemory_limit=3G bin/magento setup:install --base-url='http://local.magento.it/' --db-host='mariadb' --db-name='magento' --db-user='root' --db-password='root' --admin-firstname='Admin' --admin-lastname='Admin' --admin-email='w.sgro@gmail.com' --admin-user='w.sgro81' --admin-password='PippoBaudo1234' --language='it_IT' --currency='EUR' --timezone='Europe/Rome' --use-rewrites='1' --backend-frontname='admin' --search-engine=elasticsearch7 --elasticsearch-host=elasticsearch --elasticsearch-port=9200
```

##  compile 

```bash
composer install --no-dev
composer dump-autoload
php -d "memory_limit=-1" -d "display_errors=on"  bin/magento set:up
php  -d "memory_limit=-1" -d "display_errors=on"  bin/magento deploy:mode:set developer 
#php bin/magento deploy:mode:set production --skip-compilation
php -d "memory_limit=-1" -d "display_errors=on" bin/magento set:di:compile
php -d "memory_limit=-1" bin/magento setup:static-content:deploy it_IT -f  
php -d "memory_limit=-1" bin/magento setup:static-content:deploy en_US -f 
php -d "memory_limit=-1" bin/magento setup:static-content:deploy fr_FR -f 
php -d "memory_limit=-1" bin/magento setup:static-content:deploy en_GB -f 
php -d "memory_limit=-1" bin/magento ind:reind

php -d "memory_limit=-1" bin/magento cron:run

php -d "memory_limit=-1" bin/magento ind:reind

php -d "memory_limit=-1" -d "display_errors=on"  bin/magento c:c
php -d "memory_limit=-1" -d "display_errors=on"  bin/magento c:f
#
php -d "memory_limit=-1" -d "display_errors=on"  bin/magento ind:reind
php -d "memory_limit=-1" -d "display_errors=on"  bin/magento ind:info
php -d "memory_limit=-1" -d "display_errors=on"  bin/magento ind:reset
php -d "memory_limit=-1" -d "display_errors=on"  bin/magento indexer:status
php -d "memory_limit=-1" -d "display_errors=on"  bin/magento indexer:show-mode
php -d "memory_limit=-1" bin/magento indexer:set-mode schedule
```

## install data

```bash
bin/magento sampledata:deploy
```

## product test

http://local.magento.it/it/lorem.html

http://local.magento.it/it/lastampa.html


## issue

Actual result
Catalog Search index process error during indexation process:
Processed schema file: public_html/vendor/magento/module-elasticsearch/etc/esconfig.xsd
complex type 'mixedDataType': The content model is not determinist.

```bash
remove one line check it
vendor/magento/module-elasticsearch/etc/esconfig.xsd
<xs:element type="xs:string" name="default" minOccurs="1" maxOccurs="1" />
```

Missing languages when installing / upgrading

https://github.com/magento/magento2/issues/35655


Elasticsearch

{"error":{"root_cause":[{"type":"illegal_argument_exception","reason":"Unknown filter type [phonetic] for [phonetic]"}],"type":"illegal_argument_exception","reason":"Unknown filter type [phonetic] for [phonetic]"},"status":400}


How to retain RabbitMQ user accounts in Docker

```bash
services:
  rabbitmq:
    image: rabbitmq:management-alpine
    hostname: rabbitmq                 # <-----
    volumes:
      - rabbitdata1:/var/lib/rabbitmq/
    ports:
      - "5672:5672"
      - "15672:15672"
```

https://stackoverflow.com/questions/61137733/how-to-retain-rabbitmq-user-accounts-in-docker

```bash
sudo /usr/share/elasticsearch/bin/elasticsearch-plugin install analysis-phonetic
sudo service elasticsearch restart
```

https://stackoverflow.com/questions/72210945/illegal-argument-exception-reasonunknown-filter-type-phonetic-for-phonet

```bash
bin/magento info:language:list

php -a

print_r(\ResourceBundle::getLocales(''));

apk add apk add icu-data-full
```

## smtp mailtrap

```bash
wilson.sgro@libero.it
^Pa7hnP&l!+S'oV

Host

sandbox.smtp.mailtrap.io
Port

25, 465, 587 or 2525
Username

83dd083efe2cf5
Password

****30d1
Auth

PLAIN, LOGIN and CRAM-MD5
TLS

Optional (STARTTLS on all ports)
```

## rabbitmq

```bash
docker compose exec rabbitmq bash
rabbitmqctl add_user xl3kbe3755646 UTj4dglHayyFeFzf
rabbitmqctl set_user_tags xl3kbe3755646 administrator
rabbitmqctl add_vhost xl3kbe3755646
rabbitmqctl set_permissions -p xl3kbe3755646 xl3kbe3755646 ".*" ".*" ".*"

```

## redis

```bash
    'session' => [
        'save' => 'redis',
        'redis' => [
            'host' => 'redis',
            'port' => '6379',
            'password' => '',
            'timeout' => '2.5',
            'persistent_identifier' => '',
            'database' => '2',
            'compression_threshold' => '2048',
            'compression_library' => 'gzip',
            'log_level' => '1',
            'max_concurrency' => '6',
            'break_after_frontend' => '5',
            'break_after_adminhtml' => '30',
            'first_lifetime' => '600',
            'bot_first_lifetime' => '60',
            'bot_lifetime' => '7200',
            'disable_locking' => '0',
            'min_lifetime' => '60',
            'max_lifetime' => '2592000'
        ]
    ],
    'cache' => [
        'frontend' => [
            'default' => [
                'backend' => 'Cm_Cache_Backend_Redis',
                'backend_options' => [
                    'server' => 'redis',
                    'database' => '0',
                    'port' => '6379',
                    'password' => ''
                ],
                'id_prefix' => 'a7d_'
            ],
            'page_cache' => [
                'backend' => 'Cm_Cache_Backend_Redis',
                'backend_options' => [
                    'server' => 'redis',
                    'port' => '6379',
                    'database' => '1',
                    'compress_data' => '0'
                ],
                'id_prefix' => 'a7d_'
            ]
        ],
        'allow_parallel_generation' => false,
        'graphql' => [
            'id_salt' => 'LZJ0oEMn6SucRPlLn9EePmzho9PA8pSo'
        ]
    ],
```

## apply patch

```bash
composer require cweagans/composer-patches

git add vendor/magento/module-elasticsearch/etc/esconfig.xsd --force

composer -v install
composer update --lock
```

## custome login frontend

```bash
wilson.sgro81@gmail.com
6gbMG0VUiHRxPhF
```

## elasticsearch

http://local.magento.it:8080

```bash
curl -GET http://elasticsearch:9200
curl -GET http://127.0.0.1:9200
curl -GET http://127.0.0.1:9200/_cat/shards?v=true&s=state


curl -GET http://127.0.0.1:9200/_cluster/stats
curl -GET http://elasticsearch:9200
```

```bash
from blacktop/elasticsearch:7.10
RUN mkdir -p /usr/share/elasticsearch/jdk/bin
RUN ln -s /usr/lib/jvm/java-11-openjdk/bin/java  /usr/share/elasticsearch/jdk/bin/java 
RUN  /usr/share/elasticsearch/bin/elasticsearch-plugin install analysis-phonetic
```

```bash
/usr/share/elasticsearch/bin/elasticsearch-plugin  install analysis-phonetic
```

## portaniner

>[portainer](https://127.0.0.1:9443)

## regenerate url

```bash
php bin/magento ok:urlrewrites:regenerate --entity-type=category
```

https://github.com/olegkoval/magento2-regenerate_url_rewrites

## mariadb

```bash
SET GLOBAL innodb_buffer_pool_size=1073741824;


SELECT @@innodb_buffer_pool_size/1024/1024/1024;
```

https://stackoverflow.com/questions/68515513/memory-size-allocated-for-the-temporary-table-is-more-than-20-of-innodb-buffer


## n98-magerun2.phar sys:cron:list 

```bash
php n98-magerun2.phar sys:info
php n98-magerun2.phar sys:cron:list 
php n98-magerun2.phar config:data:acl -t
php n98-magerun2.phar config:data:indexer  -t
php n98-magerun2.phar db:query "select * from store"

n98-magerun2.phar dev:module:create [-m|--minimal] [--add-blocks] [--add-helpers] [--add-models] [--add-setup] [--add-all] [-e|--enable] [--modman] [--add-readme] [--add-composer] [--add-strict-types] [--author-name [AUTHOR-NAME]] [--author-email [AUTHOR-EMAIL]] [--description [DESCRIPTION]] [-h|--help] [-q|--quiet] [-v|vv|vvv|--verbose] [-V|--version] [--ansi] [--no-ansi] [-n|--no-interaction] [--root-dir [ROOT-DIR]] [--skip-config] [--skip-root-check] [--skip-core-commands [SKIP-CORE-COMMANDS]] [--skip-magento-compatibility-check] [--] <command> <vendorNamespace> <moduleName>

php n98-magerun2.phar dev:module:create --add-all Reply Example

php n98-magerun2.phar maintenance:enable

```

## ssl local

```bash
apk add openssl;
mkdir -p /etc/ssl/private
openssl req -x509 -nodes -days 365 -subj "/C=CA/ST=QC/O=Company, Inc./CN=local.magento.it"  -newkey rsa:2048 -keyout /etc/ssl/private/nginx-selfsigned.key -out /etc/ssl/certs/nginx-selfsigned.crt;


/etc/ssl/private/nginx-selfsigned.key -out /etc/ssl/certs/nginx-selfsigned.crt;


```

##  teach

https://www.magentiamo.it/gestione-del-catalogo-magento-attributi-categorie-prodotti/

https://www.magentiamo.it/magento-website-store-e-storeview-scopri-le-differenze/


[extension-attributes-magento-2](https://www.mgt-commerce.com/tutorial/extension-attributes-magento-2/)

[example-simple-extension-attributes](https://github.com/yireo-training/magento2-example-simple-extension-attributes)

[phpcodechecker](https://www.bairesdev.com/tools/phpcodechecker/)