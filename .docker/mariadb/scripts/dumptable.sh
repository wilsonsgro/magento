#!/bin/bash -ex

mysqldump -uroot -proot apeb ap_newoffer ap_notify ap_disponibilitaservizi reply_preventivi_richieste reply_preventivi_prodotti sales_order sales_order_item sales_order quote quote_item > dump.sql
tar -czf dump.tar.gz dump.sql
rm dump.sql