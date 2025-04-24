## site

http://local.magento.it/

https://local.magento.it/it/

```bash
wilson.sgro81@gmail.com
6gbMG0VUiHRxPhF
```

http://local.magento.it/admin

```bash
w.sgro81
PippoBaudo1234
```

```bash
mariateresa
Mariateresa1234
```


https://local.estero.it/es_gb/


## web api

```bash
curl --request POST \
  --url https://local.magento.it/rest/it/V1/integration/admin/token \
  --header 'Content-Type: application/json' \
  --header 'User-Agent: insomnia/11.0.2' \
  --data '{
  "username": "w.sgro81",
  "password": "PippoBaudo1234"
}'

curl --request GET \
  --url https://local.magento.it/it/rest/V1/rest_example/getProduct/1 \
  --header 'Authorization: Bearer eyJraWQiOiIxIiwiYWxnIjoiSFMyNTYifQ.eyJ1aWQiOjEsInV0eXBpZCI6MiwiaWF0IjoxNzQ1MzI5MjYyLCJleHAiOjE3NDUzMzI4NjJ9.IfCngwSy5xnVZdZ_Vl5KwqmpkGo_usHBoKiuCw0V_Zs' \
  --header 'User-Agent: insomnia/11.0.2'
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

##  Repository vs Collection

```php
<?php
namespace Mageplaza\HelloWorld\Block;

class HelloWorld extends \Magento\Framework\View\Element\Template
{	
	protected $_productRepository;
		
	public function __construct(
		\Magento\Backend\Block\Template\Context $context,		
		\Magento\Catalog\Model\ProductRepository $productRepository,
		array $data = []
	)
	{
		$this->_productRepository = $productRepository;
		parent::__construct($context, $data);
	}
	
	public function getProductById($id)
	{
		return $this->_productRepository->getById($id);
	}
	
	public function getProductBySku($sku)
	{
		return $this->_productRepository->get($sku);
	}
}
```


```php
<?php
namespace Mageplaza\HelloWorld\Block;

class HelloWorld extends \Magento\Framework\View\Element\Template
{    
    protected $_productCollectionFactory;
        
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,        
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,        
        array $data = []
    )
    {    
        $this->_productCollectionFactory = $productCollectionFactory;    
        parent::__construct($context, $data);
    }
    
    public function getProductCollection()
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setPageSize(3); // fetching only 3 products
        return $collection;
    }
}
?>
```

Non è possibile ottenere un'istanza di collezioni e repository allo stesso modo.

Le collezioni memorizzano lo stato, quindi devono essere trattate come oggetti nuovi; i repository, invece, sono privi di stato, quindi sono oggetti iniettabili.

Questa distinzione è importante perché ci dice che le collezioni devono essere istanziate attraverso un factory, mentre i repository possono essere istanziati attraverso una dependency injection basata su un costruttore.

Tradotto con DeepL.com (versione gratuita)


## Understand Core DDD Principles

Domain-Driven Design (DDD) is a methodology for designing and managing the complexity of software projects by focusing on the domain model. Implementing DDD in PHP requires some understanding of DDD principles, which are then translated into code through various design patterns.

Domain Model: Represents the core business concepts, entities, and processes.

Bounded Context: Defines the boundary within which a particular model applies.

Entities and Value Objects: Entities have a unique identity, while value objects do not.

Aggregates: A group of related entities and value objects treated as a single unit.

Repositories: Handle retrieving and persisting aggregates.

https://medium.com/@psfpro/implementing-ddd-in-php-dfae8f3790c2


PROs

I repository facilitano l'accesso ai dati.
I repository consentono di cambiare il livello di accesso ai dati senza influenzare il codice che li utilizza.
I repository consentono di introdurre miglioramenti delle prestazioni, come la cache (ad esempio, il repository Product visto sopra).
Le collezioni consentono un maggiore controllo sulla selezione e sul filtraggio dei dati.


CONs

I repository offrono un minor controllo sulla selezione e sul filtraggio dei dati.
Le collezioni sono strettamente legate al livello di persistenza, più accoppiate e meno facili da sostituire.


## Adding widget parameters

text
select
multiselect
block

## crontab -l

```bash
crontab -e
crond &

crond -f -l 2
```

## Cacheable and uncacheable pages

Redis
Varnish
Database

disable: cacheable="false"

```xml
<block class="Magento\Customer\Block\Form\Edit" name="customer_edit" template="Magento_Customer::form/edit.phtml" cacheable="false">
    <container name="form.additional.info" as="form_additional_info"/>
</block>
```

## Maintenance

edit file pub/errors/default/503.phtml


## Change image types or sizes

```xml
<theme_dir>/etc/view.xml
```

## Extends less

```bash
app/design/frontend/Agap2/Default/web/css/source/_extend.less
```

```less
@import "base/_base.less";

@import "components/_components.less";
```

```bash
app/design/frontend/Agap2/Default/web/css/source/base/_base.less
app/design/frontend/Agap2/Default/web/css/source/components/_components.less
```

## custom logo

curl https://www.amicafarmacia.com/static/version1745386632/frontend/Amicafarmacia/Default/it_IT/images/logo.svg --output logo.svg

https://www.reshot.com/free-svg-icons/logo/?page=2

edit

app/design/frontend/Reply/Default/web/images
app/design/frontend/Reply/Default/Magento_Theme/layout/default.xml


## debug fronted

```bash
bin/magento dev:template-hints:enable
bin/magento cache:clean config full_page

bin/magento dev:template-hints:disable
```

https://local.magento.it/it/what-s-new.html?templatehints=magento


## Twig better than PHP as a template engine

cat vendor/magento/module-sales/view/frontend/email/creditmemo_new_guest.html

```bash
<?php echo $var ?>
<?php echo htmlspecialchars($var, ENT_QUOTES, 'UTF-8') ?>
```

```bash
{{ var }}
{{ var|escape }}
{{ var|e }}         {# shortcut to escape a variable #}
```

## Layouts

(1) I layout forniscono le strutture delle pagine Web utilizzando un file XML che identifica tutti i contenitori e i blocchi che compongono la pagina. I dettagli dei file XML di layout sono descritti più avanti in questa sezione.

(2) I contenitori assegnano la struttura del contenuto a una pagina utilizzando i tag container all'interno di un file XML di layout. Un contenitore non ha altro contenuto se non quello degli elementi inclusi. Esempi di contenitori sono l'intestazione, la colonna sinistra, la colonna principale e il piè di pagina.

(3) I blocchi rendono gli elementi dell'interfaccia utente di una pagina utilizzando i tag block all'interno di un file XML di layout. I blocchi utilizzano modelli per generare l'HTML da inserire nel blocco strutturale padre. Esempi di blocchi sono l'elenco delle categorie, il mini-carrello, i tag dei prodotti e l'elenco dei prodotti.


block after "-" :  Utilizzare il trattino (-) per posizionare il blocco dopo tutti gli altri elementi del suo livello di annidamento. Per maggiori dettagli, vedere gli attributi before e after.

block  <action method="setClass">

```php
 $child->setClass($outermostClass);
```

Il layout di questo file viene applicato solo al prodotto virtuale:

vendor/magento/module-catalog/view/frontend/layout/catalog_product_view_type_virtual.xml


## Translation dictionaries

<Magento_Checkout_module_dir>/i18n/pt_BR.csv
<Magento_Checkout_module_dir>/<theme>/i18n/pt_BR.csv


Strings added in .js files

```js
define (['jquery', 'mage/translate'], function ($, $t) {...});
$.mage.__('<string>');
$t('<string>');
$t('Hello %1').replace('%1', yourVariable);

```


## Custom form validation rules


## Custom Controller

https://local.magento.it/it/reply/debug/index
https://local.magento.it/it/reply/debug/import

https://local.magento.it/it/reply/index/index

https://local.magento.it/it/reply/index/test


## csp

content-security-policy-report-only:

Le politiche di sicurezza dei contenuti (CSP) sono un potente strumento per mitigare il Cross Site Scripting (XSS) e gli attacchi correlati, tra cui lo skimmer di carte di credito, il dirottamento di sessioni, il clickjacking e altri ancora. I server Web inviano i CSP nelle intestazioni HTTP di risposta (in particolare Content-Security-Policy e Content-Security-Policy-Report-Only) ai browser che inseriscono nella whitelist le origini di script, stili e altre risorse. Insieme, i CSP e le funzioni integrate dei browser aiutano a prevenire:

Il caricamento di uno script dannoso da un sito web di un aggressore
Uno script inline dannoso invia le informazioni della carta di credito a un sito web di un aggressore
Il caricamento di uno stile dannoso che induce gli utenti a fare clic su un elemento che non dovrebbe essere presente in una pagina


Il cross-site scripting (XSS) è una vulnerabilità informatica che affligge siti web dinamici che impiegano un insufficiente controllo dell'input nei form. Un XSS permette a un cracker di inserire o eseguire codice lato client al fine di attuare un insieme variegato di attacchi quali, ad esempio, raccolta, manipolazione e reindirizzamento di informazioni riservate, visualizzazione e modifica di dati presenti sui server, alterazione del comportamento dinamico delle pagine web, ecc.

Nell'accezione odierna, la tecnica ricomprende l'utilizzo di qualsiasi linguaggio di scripting lato client tra i quali JavaScript, VBScript, Flash. Il loro effetto può variare da un piccolo fastidio a un significativo rischio per la sicurezza, a seconda della sensibilità dei dati trattati nel sito vulnerabile e dalla natura delle strategie di sicurezza implementate dai proprietari del sito web.

Secondo un rapporto di Symantec, nel 2007 l'80% di tutte le violazioni era dovuto ad attacchi XSS


## knockout



KO observables:

La caratteristica più utile di Knockout JS è l'osservabile e gli array osservabili. Permette di avere un data-binding dinamico con variabili che vengono immediatamente aggiornate nel template quando il valore all'interno del componente cambia. Un array osservabile agisce allo stesso modo e, come un normale osservabile, è possibile sottoscrivere gli eventi di modifica e creare una logica all'interno del componente quando i valori cambiano.

Procediamo quindi ad aggiornare il nostro componente e il template per testare un osservabile.

Nel nostro file del componente dobbiamo aggiungere una nuova chiave collegata all'oggetto componente e assegnare il suo valore come osservabile con un valore iniziale di 0. Questo ci permette di accedere al valore di myTimer nel template.

```html
<div class="component-wrapper">
    <div data-bind="text: 'Catalog Timer'"></div>
    <div data-bind="text: myTimer"></div>
</div>
```

```js
define(['jquery', 'uiComponent', 'ko'], function ($, Component, ko) {
        'use strict';
        return Component.extend({
            myTimer: ko.observable(0),
            initialize: function () {
                this._super();
            }
        });
    }
);
```

subscribe:

È anche possibile sottoscrivere gli osservabili, il che significa che quando il loro valore viene modificato, viene generato un evento a cui ci si può agganciare per eseguire un qualche tipo di logica all'interno di un'altra funzione o di più funzioni. Quindi, nel nostro esempio, aggiorneremo il colore del testo del timer con un colore casuale ogni volta che la variabile myTimer si aggiorna.

```js
define(['jquery', 'uiComponent', 'ko'], function ($, Component, ko) {
        'use strict';
        
        var self;
        return Component.extend({
            myTimer: ko.observable(0),
            randomColour: ko.observable("rgb(0, 0, 0)"),
            initialize: function () {
                self = this;
                this._super();
                //call the incrementTime function to run on intialize
                this.incrementTime();
                this.subscribeToTime();
            },
            //increment myTimer every second
            incrementTime: function() {
                var t = 0;
                setInterval(function() {
                    t++;
                    self.myTimer(t);
                }, 1000);
            },
            subscribeToTime: function() {
                this.myTimer.subscribe(function(newValue) {
                    console.log(newValue);
                    self.updateTimerTextColour();
                });
            },
            randomNumber: function() {
                return Math.floor((Math.random() * 255) + 1);
            },
            updateTimerTextColour: function() {
                //define RGB values
                var red = self.randomNumber(),
                    blue = self.randomNumber(),
                    green = self.randomNumber();
                    
                self.randomColour('rgb(' + red + ', ' + blue + ', ' + green + ')');
            }
        });
    }
);
```

computed:

Ovviamente gli osservabili sono ottimi se si vogliono gestire stringhe o valori booleani, ma che dire di logiche più complesse?

KO JS ci fornisce il metodo computed, che ci consente di creare un osservabile basato sulla logica restituita dalla funzione computed. Questo può essere una combinazione di qualsiasi cosa, compresi normali osservabili o semplici valori di stringa.

Miglioriamo quindi il nostro codice in modo che il colore del timer si aggiorni quando uno o più valori RGB cambiano.

```js
define(['jquery', 'uiComponent', 'ko'], function ($, Component, ko) {
    'use strict';
    var self;
    return Component.extend({
        myTimer: ko.observable(0),
        red: ko.observable(0),
        blue: ko.observable(0),
        green: ko.observable(0),
        initialize: function () {
            self = this;
            this._super();
            //call the incrementTime function to run on intialize
            this.incrementTime();
            this.subscribeToTime();
            this.randomColour = ko.computed(function() {
                //return the random colour value
                return 'rgb(' + this.red() + ', ' + this.blue() + ', ' + this.green() + ')';
            }, this);
        },
        //increment myTimer every second
        incrementTime: function() {
            var t = 0;
            setInterval(function() {
                t++;
                self.myTimer(t);
            }, 1000);
        },
        subscribeToTime: function() {
            this.myTimer.subscribe(function(newValue) {
                console.log(newValue);
                self.updateTimerTextColour();
            });
        },
        randomNumber: function() {
            return Math.floor((Math.random() * 255) + 1);
        },
        updateTimerTextColour: function() {
            //define RGB values
            /*notice we now no longer have to set and return the RBG style code here
             we simply update the red/blue/green observables and the computed observable
             returns the style element to the template */
            this.red(self.randomNumber());
            this.blue(self.randomNumber());
            this.green(self.randomNumber());
        }
    });
});
```
## Façade pattern

```java
class CPU {
    public void freeze() { ... }
    public void jump(long position) { ... }
    public void execute() { ... }
}

class Memory {
    public void load(long position, byte[] data) { ... }
}

class HardDrive {
    public byte[] read(long lba, int size) { ... }
}

/* Facade */

class ComputerFacade {
    private CPU processor;
    private Memory ram;
    private HardDrive hd;

    public ComputerFacade() {
        this.processor = new CPU();
        this.ram = new Memory();
        this.hd = new HardDrive();
    }

    public void start() {
        processor.freeze();
        ram.load(BOOT_ADDRESS, hd.read(BOOT_SECTOR, SECTOR_SIZE));
        processor.jump(BOOT_ADDRESS);
        processor.execute();
    }
}

/* Client */

class You {
    public static void main(String[] args) {
        ComputerFacade computer = new ComputerFacade();
        computer.start();
    }
}
```

##  teach

https://www.magentiamo.it/gestione-del-catalogo-magento-attributi-categorie-prodotti/

https://www.magentiamo.it/magento-website-store-e-storeview-scopri-le-differenze/


[extension-attributes-magento-2](https://www.mgt-commerce.com/tutorial/extension-attributes-magento-2/)

[example-simple-extension-attributes](https://github.com/yireo-training/magento2-example-simple-extension-attributes)

[phpcodechecker](https://www.bairesdev.com/tools/phpcodechecker/)

[cron-in-docker](https://blog.thesparktree.com/cron-in-docker)

[virtual-type-preference-type](https://chop-chop.org/blog/virtual-types-types-preferences-magento-2-design-patterns-pt-2)

[csp](https://developer.adobe.com/commerce/php/development/security/content-security-policies/)

[knockout](https://inviqa.com/blog/using-knockout-js-magento-2)


https://magento.stackexchange.com/questions/158081/when-should-we-use-a-repository-and-factory-in-magento-2

https://www.bitbull.it/blog/magento-fundamentals-what-differences-between-collections-and-repositories/


https://deviq.com/design-patterns/repository-pattern


https://www.bitbull.it/blog/magento-fundamentals-what-differences-between-collections-and-repositories/


https://meetanshi.com/blog/create-custom-product-attribute-using-data-patch-in-magento-2/


https://experienceleague.adobe.com/en/docs/commerce-admin/start/setup/store-details

https://developer.adobe.com/commerce/frontend-core/guide/


https://developer.adobe.com/commerce/php/tutorials/backend/


https://developer.adobe.com/commerce/frontend-core/guide/translations/theory/