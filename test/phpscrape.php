<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 2018-09-12
 * Time: 12:00
 * https://gist.github.com/anchetaWern/6150297#file-php-webscraping-md
 */
$url = "http://testing-ground.scraping.pro/textlist";
$html = file_get_contents($url); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if (!empty($html))
{ //if any html is actually returned

    $pokemon_doc->loadHTML($html);
    libxml_clear_errors(); //remove errors for yucky html

    $pokemon_xpath = new DOMXPath($pokemon_doc);

    $pokemon_row = $pokemon_xpath->query('//div[@id="case_textlist"]');

    if ($pokemon_row->length > 0)
    {
        echo "Scraped with PHP query: <a href='$url'>$url</a><br><br>";
        foreach ($pokemon_row as $row)
        {
            echo $row->nodeValue . "<br/>";
        }
    }
}
echo "<br><a href='index_test.php'>Back to index</a>"

?>