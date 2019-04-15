FROM mysql:5.7

COPY etc/mysql/mysql.conf.d/mysqld.cnf /etc/mysql/mysql.conf.d/
COPY etc/mysql/conf.d/mysql.cnf /etc/mysql/conf.d/
COPY init-db.sh /docker-entrypoint-initdb.d
CMD ["mysqld"]
