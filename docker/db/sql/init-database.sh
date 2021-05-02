#run the setup script to create the DB and the schema in the DB
mysql -uroot -proot kynaforkids < "/docker-entrypoint-initdb.d/kynaforkids.sql"
