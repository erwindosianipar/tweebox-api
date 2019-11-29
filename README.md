# Tweebox Send Twitter Status from box API

Twitter update status from sendbox API
PHP library Twitter's OAuth REST API: https://github.com/abraham/twitteroauth/

<img src="https://img.shields.io/github/issues/erwindosianipar/tweebox-api"> <img src="https://img.shields.io/github/forks/erwindosianipar/tweebox-api"> <img src="https://img.shields.io/github/stars/erwindosianipar/tweebox-api"> <img src="https://img.shields.io/github/license/erwindosianipar/tweebox-api"> <img src="https://img.shields.io/twitter/url?url=https%3A%2F%2Fgithub.com%2Ferwindosianipar%2Ftweebox-api">

<ul>
  <li>PHP Native</li>
  <li>PHP library Twitter OAuth</li>
  <li>Bootstrap v4</li>
  <li>Sweet Alert2</li>
</ul>

<img src="http://pngimg.com/uploads/twitter/twitter_PNG9.png" alt="Twitter bird" width="200px">

# Cron Job Setting
Create cronjob to automatic script running
1. 0,30	*	*	*	*	php -q /home/user/public_html/path/twitter/retweet.php >/dev/null 2>&1
2. */5	*	*	*	*	php -q /home/user/public_html/path/twitter/index.php >/dev/null 2>&1
