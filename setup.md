ctrl shift v to preview
turn off double click to exit preview in visual studio code:
File > Preferences > Settings > double click to...

# Optional: Clear any existing website
```bash
sudo rm /var/www/html/*.php
```
```bash
sudo rm /var/www/html/*
```
```bash
sudo systemctl stop apache2
```
# 1. Install and start nginx
```bash
sudo apt install nginx
```
```bash
sudo systemctl start nginx
```
```bash
sudo systemctl enable nginx
```
# 2. Install PHP and PHP-FPM
```bash
sudo apt install php php-fpm php-mysql
```
# 3. Install MYSQL
```bash
sudo apt install mysql-server
```
# 4. Secure the MySQL installation
```bash
sudo mysql_secure_installation
```
*simply click 'enter' or skip every prompt*

# 5. Configure Nginx to use PHP
```bash
sudo nano /etc/nginx/sites-available/default
```
```
nginx
    server {
        listen 80 default_server;
        listen [::]:80 default_server;

        root /var/www/html;
        index index.php index.html index.htm index.nginx-debian.html;
        *add in index.php above ^*
        server_name _;

        location / {
            try_files $uri $uri/ =404;
        }

        location ~ \.php$ {
            include snippets/fastcgi-php.conf; 
            *uncomment this line*
            fastcgi_pass unix:/var/run/php/php8.1-fpm.sock; 
            *^uncomment this line, 8.1 should be the version of ur php, run php -v to check*
        }
    }
    
```
# 6. Reload nginx
```bash
sudo nginx -t
```
```bash
sudo systemctl reload nginx
```
# 7. Set up SQL
```bash
sudo mysql -u root -p
```
*enter the below 3 queries:*
```sql
CREATE DATABASE testdb;
```
```sql
USE testdb;
```
```sql
CREATE TABLE products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        description TEXT
    );
```
# 7.1 Set up SQL user 'phpuser'
```sql
CREATE USER 'phpuser'@'localhost' IDENTIFIED WITH mysql_native_password BY '';
```
```sql
GRANT ALL PRIVILEGES ON testdb.* TO 'phpuser'@'localhost';
```
```sql
GRANT FILE ON *.* TO 'phpuser'@'localhost';
```
```sql
FLUSH PRIVILEGES;
```
# 7.2 Clear SQL table
```sql
TRUNCATE TABLE products;
```
# 8 DISABLE APP ARMOR for sql
```bash
sudo apt-get install apparmor-utils
```
```bash
sudo aa-complain /etc/apparmor.d/usr.sbin.mysqld
```
# 9 Set permissions of /var/www/html
```bash
sudo chown -R "student":www-data /var/www/html
```
```bash
sudo chmod -R 777 /var/www/html
```
```bash
sudo chmod g+s /var/www/html
```
# 10 disable secure_file_priv
```bash
sudo nano /etc/mysql/mysql.conf.d/mysqld.cnf
```
```bash
secure-file-priv = /var/www/html
```
```bash
sudo systemctl restart mysql
```
```sql
sudo mysql -u root -p
```
check that it worked
```sql
SHOW VARIABLES LIKE 'secure_file_priv'; 
```

# LAST STEP: Add the files to /var/www/html
```bash
sudo nano /var/www/html/additem.html
```
```bash
sudo nano /var/www/html/additem.php
```
```bash
sudo nano /var/www/html/viewitem.html
```
```bash
sudo nano /var/www/html/viewitem.php
```
Paste the 4 scripts into their respective location 


# ? Do we need secure file priv, 
# ? Do we need mysql to own the /var/www/html folder?

# it does not work within 10 minutes

Im getting familiar errors.