



 iconv(): Wrong encoding, conversion from iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $value); is not allowed in /var/www/vendor/magento/module-eav/Model/Attribute/Data/Text.php on line 190
Trace: <pre>#1 iconv() called at [vendor/magento/module-eav/Model/Attribute/Data/Text.php:190]


https://github.com/docker-library/php/issues/240#issuecomment-876464325


into dockerfile

RUN apk add --no-cache --repository http://dl-cdn.alpinelinux.org/alpine/v3.13/community/ --allow-untrusted gnu-libiconv=1.15-r3 
ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php