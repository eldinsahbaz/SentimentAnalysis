This directory is a simple web application Twitter Crawler.

If running this web application locally, point localhost to this directory.

The front page of the app is sentiment.php (localhost/sentiment.php)
This will give you two options to retrieve tweets.
1) By twitter handle with specified amount
2) By twitter hashtag with specified amount

After filling out one of the two forms, you will be redirected to either localhost/littleApp.php or localhost/littleAppHash.php

You will see the results of your query on the webpage, but in adition the output of just the 'text' (tweet) field will be added to the 
output.txt file. Everytime you run the query the output file is refreshed, so it will only have the most recent query results.

This can be utilized with the sentiment analyzer, because the output.txt file can be passed to the classifier to classify the tweets.

-Eli Goldweber
