# Synology_CardDav_VCF_Export
Php script to export vcard from Synology CardDav server

To use this script on your synology NAS (tested with DSM 6.2.2-24922 Update 2) :
- activate the web server
- activate php (tested with php 5.6)
- activate postgresql PDO addon
- upload export script in the web directory tree

- to allow access from php script to the database, connect in admin with ssh and add following line in /etc/postgresql/pg_ident.conf 
- pg_root       http              postgres

- relaunch the postgresql server :
  - sudo psql -U postgres
  - postgres=> SELECT pg_reload_conf();
  - \q
  
  Use URL http://diskstation/ chosen directory /export.php to upload the vcf file
  
  In case of issue debug by activated display_errors php parameter
