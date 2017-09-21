"# today-is-your-birthday-" 
 #
 # Author: Ali Alrawi
 #
 # This project is meant to be a solution for the ZainCash PreScreening Exam.
 #
 # Tools: C9 IDE, Github, xampp and sublime-text-3 on Ubuntu OS .
 #
 # If you would like to test on your localhost then you can use the command line below to import the database.
 # `mysql -h localhost -u root -p birthday  < ./database/birthday.sql`
 #
 # The script `main.php` should be executed via cron job schedule and set to run at 12:00Am every day of every month to check for customers birthday.
 # 
 # `0,0 * * * * /usr/local/bin/php /home/ubuntu/workspace/main.php`
 # As a workaround, to the test the project I have created a cron job simulation php script that will run `main.php` every 15 sec.
 #
 # On terminal, run this command `php cron-job.php` to start `cron-job.php`.
 # You can see the logs in `crontab.log`.
 #
 # For the database structure, please take a look at `database/birthday.sql`.
 