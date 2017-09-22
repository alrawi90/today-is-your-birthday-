<?php
// cron job simulation script
while(true)
{
    sleep(15); // sleep for x sec
    //echo "ok\n";
    echo exec(' php -q /home/ubuntu/workspace/main.php schedule:run >> /home/ubuntu/workspace/crontab.log 2>&1');
}

?>


