<?php
date_default_timezone_set('Asia/Jakarta');

require_once "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

$sapi_type = php_sapi_name();
	
if (substr($sapi_type, 0, 3) == 'cli' || empty($_SERVER['REMOTE_ADDR']))
{

    define('CONSUMER_KEY', 'YOUR_CONSUMER_KEY');
    define('CONSUMER_SECRET', 'YOUR_CONSUMER_SECRET');
    define('ACCESS_TOKEN', 'YOUR_ACCESS_TOKEN');
    define('ACCESS_TOKEN_SECRET', 'YOUR_ACCESS_TOKEN_SECRET');
    
    $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
    	
    $query = array(
        "q"     =>
        array(
                1  => 'html5',
                2  => 'css3',
                3  => 'js',
                4  => 'javascript',
                5  => 'php',
                6  => 'php7',
                6  => 'python',
                7  => 'golang',
                8  => 'ruby',
                9  => 'programmer',
                10 => 'coding',
                11 => 'codeigniter',
                12 => 'google',
                13 => 'microsoft',
                14 => 'jquery',
                15 => 'kubernetes',
                16 => 'laravel',
                17 => 'hackathon',
                18 => 'programming',
                19 => 'vue.js',
                20 => 'computer science',
                21 => 'sebuah utas',
                22 => 'twitter please do your magic'
            ),
        "rpp"   => 15
    );
    
    $tweets = $connection->get('search/tweets', $query);
    foreach ($tweets->statuses as $tweet)
    {
        $status = 'https://twitter.com/'.$tweet->user->screen_name.'/status/'.$tweet->id;
    	$connection->post("statuses/update", ["status" => $status]);
    }
    echo '<pre>{"success":[{"code":200,"message":"Twitter successfully sended."}]}</pre>';
}
else
{
    echo '<pre>{"errors":[{"code":215,"message":"Bad Authentication data."}]}</pre>';
}
?>
