![Lunch Train](https://user-images.githubusercontent.com/32463/28790268-42eebab4-75dd-11e7-80ce-e825b5a703df.png)

 ## Lunch Train

This repo contains the code for the Slack demo app Lunch Train: http://www.lunchtrainbot.com/

Lunch Train is a Slack app that helps you schedule and coordinate team social outings like lunch trips.

### Code Overview

#### Landing page
Landing page HTML is in `index.php` and all the assets are inside these folders:  js, img, fonts, font-awesome, CSS 

#### Heroku Configurations
app.json, composer.json and Procfile together define the heroku app configuration.


#### Libraries

Files inside `include` directory are various small libraries that are used in Lunch Train

* config.php: Slack app configuration
* db_config.php: Database configuration
* init.php: initial load configuration
* lib_app_installs.php: methods to manage api token storage.
* lib_curl.php: handles http download requests
* lib_db.php: Database management
* lib_message.php: creates message payload for slack messages
* lib_slack.php: methods to post/update messages to slack
* lib_time_parser.php: parse natural language time inside the slash command
* lib_trains.php, lib_train_actions.php: 

#### Database schema
schama.sql contains the lunch train MySQL DB schema.

#### Command & Action Requests
* Slash command requests are processed by `command.php`
* Button action requests are processed by `action.php`
* Slack Events API events are processed by `events.php`

#### Setup and Development
1. Create your config file by copying `include/config-example.php` and renaming it to `config.php`, and adding your app's credentials.
2. Setup Heroku locally: https://devcenter.heroku.com/articles/getting-started-with-php#set-up
3. Within the LunchTrain clone, run the line `heroku git:remote -a lunchtrainbot-staging`
4. Install MAMP (apache and MySQL). https://www.mamp.info/en/ and setup database using `schema.sql`
5. Add LunchTrain folder to your webroot.
6. Add the notification cron job:

   `cron_leave_now_2_min_warning` is executed every minute to send 2-minute warnings and update the in-channel message that train has left. The cron is executed from `dev-sandbox`. Following is the cron config. 
   ```
   * * * * * curl "http://lunchtrainbot-staging.herokuapp.com/cron_leave_now_2_min_warning.php?env=dev"
   * * * * * curl "http://lunchtrainbot.herokuapp.com/cron_leave_now_2_min_warning.php?env=prod"
   ```
   
