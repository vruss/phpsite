<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 2018-09-12
 * Time: 11:42
 * https://phpbestpractices.org/
 * https://ec.haxx.se/
 * http://php.net/manual/en/book.curl.php
 * http://www.jacobward.co.uk/working-with-the-scraped-data-part-2/
 */
// create curl resource
$ch = curl_init();
//$url = "http://testing-ground.scraping.pro/textlist";
$url = "https://torrentmr.net/bbs/s.php?k=&q=mr+sunshine";

// set url
curl_setopt($ch, CURLOPT_URL, $url);

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
if (curl_exec($ch) === false)
{
    echo 'Curl error: ' . curl_error($ch);
    exit;
}
else
{
    echo "Scraped with cURL: <a href='$url'>$url</a><br><br>";
    $html = curl_exec($ch);
}

// close curl resource to free up system resources
curl_close($ch);
//        echo $output;

//$regex = '/<div id="case_textlist">(.*?)<\/div>/s';
//if (preg_match($regex, $html, $list))
//{
//    foreach ($list as $i)
//    {
//        echo "$i<br>";
//    }
//}
//else
//    print "Scrape found nothing";
echo $html;
echo "<a href='index_test.php'>Back to index</a>"
?>