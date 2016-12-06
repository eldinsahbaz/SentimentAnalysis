<html>
<body>
<form action="sentiment.php" method="get">
  <input type="submit" value="Go Back">
</form>
<br>
<br>
<?php
require_once('TwitterAPIExchange.php');
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "375425960-EV9v2Cw6WApJPfEGyJzy9bDgPoTTe2xDlZzXujYF",
    'oauth_access_token_secret' => "cchWZp3CE65wLR1l7yho3w2KmejWulm8rjopB6lj8YKiI",
    'consumer_key' => "9cyYM9oAMBCc0bTlCW6Ar3aGh",
    'consumer_secret' => "HkB8J83rI8iLXlk8c4rfCRHsE0M83LyvbMo9yeQKHjkYJ8eE5P"
);

$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$requestMethod = "GET";

$user = $_POST["name"];
$count = $_POST["amount"];
//if (isset($_GET['user']))  {$user = $_GET['user'];}  else {$user  = "TheOnion";}
//if (isset($_GET['count'])) {$count = $_GET['count'];} else {$count = 100;}
$getfield = "?screen_name=$user&count=$count&lang=en";
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);
//if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
$file = 'output.txt';
file_put_contents($file, "");

foreach($string as $items)
    {
        echo "Time and Date of Tweet: ".$items['created_at']."<br />";
        echo "Tweet: ". $items['text']."<br />";
        $current = file_get_contents($file);
	$current = $current . $items['text'] ."\n";
	file_put_contents($file, $current);
	echo "Tweeted by: ". $items['user']['name']."<br />";
        echo "Screen name: ". $items['user']['screen_name']."<br />";
        echo "Followers: ". $items['user']['followers_count']."<br />";
        echo "Friends: ". $items['user']['friends_count']."<br />";
        echo "Listed: ". $items['user']['listed_count']."<br /><hr />";
    }
echo "<h2>Simple Twitter API Test -- Twitter Handle</h2>";
?>

</html>
</body>
