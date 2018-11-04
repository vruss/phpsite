<!DOCTYPE html>
<head>
    <title>miun.viro.se</title>
</head>

<body>
<h1>Hello, welcome to my test website!</h1>
<h3>It's running on a Apache2 Ubuntu server with PHP7.2 and cURL support</h3>

<?php
echo "Apache version: " . apache_get_version();
echo "<br>PHP version: " . phpversion();
echo "<br>cURL version: " . curl_version()["version"];
?>

<br><br>
<a href="curl.php">cURL scrape test</a><br>
<a href="phpscrape.php">PHP scrape test</a>

<br><br>
<span>creator: Viktor Rosvall</span>

</body>
</html>
