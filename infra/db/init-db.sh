# while :
# do
#   if mysql -h $MYSQL_HOST -u root -p$MYSQL_ROOT_PASSWORD -e "quit" > /dev/null 2>&1 ; then
#     echo "MySQL master is ready!"
#     break
#   else
#     echo "MySQL master is not ready"
#   fi
#   sleep 3
# done
# 
# mysql -h $MYSQL_HOST -u root -p$MYSQL_ROOT_PASSWORD -e "CREATE USER IF NOT EXISTS '$MYSQL_USER'@$SOURCE_IP' IDENTIFIED BY '$MYSQL_REPL_PASSWORD';"
# mysql -h $MYSQL_HOST -u root -p$MYSQL_ROOT_PASSWORD -e "GRANT REPLICATION SLAVE ON *.* TO '$MYSQL_REPL_USER'@'$SOURCE_IP';"

mysql -h db -u root -p$MYSQL_ROOT_PASSWORD -e \
"CREATE DATABASE IF NOT EXISTS meditan"
mysql -h db -u root -p$MYSQL_ROOT_PASSWORD -e \
"CREATE DATABASE IF NOT EXISTS meditan_test"
