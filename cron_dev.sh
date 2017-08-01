#
# crontab -e 
# * * * * * /home/saurabh/www/LunchTrain/cron_dev.sh 
#

cd /home/saurabh/www/LunchTrain

export train_env=dev

php cron_leave_now_2_min_warning.php 

