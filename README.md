## site

http://local.magento.it/

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

##  teach

https://www.magentiamo.it/gestione-del-catalogo-magento-attributi-categorie-prodotti/

https://www.magentiamo.it/magento-website-store-e-storeview-scopri-le-differenze/


icu-data-full