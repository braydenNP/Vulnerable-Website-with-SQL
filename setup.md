head
# Install nginx
sudo apt install nginx

# ADD phpuser
CREATE USER 'phpuser'@'localhost' IDENTIFIED WITH mysql_native_password BY '';
GRANT ALL PRIVILEGES ON testdb.* TO 'phpuser'@'localhost';
GRANT FILE ON *.* TO 'phpuser'@'localhost';
FLUSH PRIVILEGES;

# Clear table

# disable secure_file_priv
sudo nano /etc/mysql/mysql.conf.d/mysqld.cnf
secure-file-priv = /var/www/html
sudo systemctl restart mysql
sudo mysql -u root -p
SHOW VARIABLES LIKE 'secure_file_priv'; <- check that it worked

# DISABLE APP ARMOR
sudo apt-get install apparmor-utils
sudo aa-complain /etc/apparmor.d/usr.sbin.mysqld

# Give ownership of /var/www/html to nginx (www-data)
sudo chown -R "student":www-data /var/www/html
sudo chmod -R 0755 /var/www/html
