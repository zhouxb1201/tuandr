while true
do
        a=`cat /www/wwwroot/www.tuandr.com/sectask/persecmark.txt`
        if [[ $a -gt 1 ]]
        then 
        sh /var/spool/cron/poe3.sh
        fi
        sleep 1
done
