<html>
<body>
<form action="sentiment.php" method="get">
  <input type="submit" value="Go Back">
</form>
<br>
<br>
<?php
//echo "ss\\n";
require_once('TwitterAPIExchange.php');
if (isset($_POST['name1']))  {$user = $_POST['name1'];}  else {$user  = "TheOnion";}
if (isset($_POST['amount1'])) {$count = $_POST['amount1'];} else {$count = 5;}
//echo $_POST['name1'];
//echo $_POST['amount1'];



/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "375425960-EV9v2Cw6WApJPfEGyJzy9bDgPoTTe2xDlZzXujYF",
    'oauth_access_token_secret' => "cchWZp3CE65wLR1l7yho3w2KmejWulm8rjopB6lj8YKiI",
    'consumer_key' => "9cyYM9oAMBCc0bTlCW6Ar3aGh",
    'consumer_secret' => "HkB8J83rI8iLXlk8c4rfCRHsE0M83LyvbMo9yeQKHjkYJ8eE5P"
);
$resultType = "popular";
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = "?q=#$user&count=$count";
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest(),$assoc = TRUE);
//$response = $twitter->setGetfield($getfield)
//    ->buildOauth($url, $requestMethod)
//    ->performRequest();

//var_dump(json_decode($response));
//echo json_decode($response);

//var_dump($string["statuses"]);

//if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
$file = 'test.txt';
file_put_contents($file, "");

foreach($string["statuses"] as $items)
    {
echo "Time and Date of Tweet: ".$items['created_at']."<br />";
   echo "Tweet: ". $items['text']."<br /><hr />";
   $current = file_get_contents($file);
        //echo $current . "////";
        $current = $current . $items['text'] ."\n";
        file_put_contents($file, $current);

}

echo "<h2>Simple Twitter API Test HashTags</h2>";

?>

</html>
</body>
