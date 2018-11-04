<?php
/**
 * http://www.jacobward.co.uk/web-scraping-with-php-curl-part-1/
 * http://www.jacobward.co.uk/working-with-the-scraped-data-part-2/
 * http://www.jacobward.co.uk/navigating-and-scraping-multiple-pages-with-php-curl-part-3/
 */
/**
 * http://www.jacobward.co.uk/web-scraping-with-php-curl-part-1/
 * http://www.jacobward.co.uk/working-with-the-scraped-data-part-2/
 * http://www.jacobward.co.uk/navigating-and-scraping-multiple-pages-with-php-curl-part-3/
 */
// Defining the basic cURL function
function curl($url)
{
    // Assigning cURL options to an array
    $options = Array(
        CURLOPT_RETURNTRANSFER => TRUE,  // Setting cURL's option to return the webpage data
        CURLOPT_FOLLOWLOCATION => TRUE,  // Setting cURL to follow 'location' HTTP headers
        CURLOPT_AUTOREFERER => TRUE, // Automatically set the referer where following 'location' HTTP headers
        CURLOPT_CONNECTTIMEOUT => 120,   // Setting the amount of time (in seconds) before the request times out
        CURLOPT_TIMEOUT => 120,  // Setting the maximum amount of time for cURL to execute queries
        CURLOPT_MAXREDIRS => 10, // Setting the maximum number of redirections to follow
        CURLOPT_USERAGENT => "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1a2pre) Gecko/2008073000 Shredder/3.0a2pre ThunderBrowse/3.2.1.8",  // Setting the useragent
        CURLOPT_URL => $url, // Setting cURL's URL option with the $url variable passed into the function
    );

    $ch = curl_init();  // Initialising cURL
    curl_setopt_array($ch, $options);   // Setting cURL's options using the previously assigned array data in $options
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
        'authority: torrenthaja.com',
        'Referer: https://torrenthaja.com/bbs/search.php?search_flag=search&stx=mr+sunshine'));
    $data = curl_exec($ch); // Executing the cURL request and assigning the returned data to the $data variable
    curl_close($ch);    // Closing cURL
    return $data;   // Returning the data from the function
}

// Defining the basic scraping function
/**
 * @param $data
 * @param $start
 * @param $end
 * @return bool|string
 */
function scrape_between($data, $start, $end)
{
    $data = stristr($data, $start); // Stripping all data from before $start
    $data = substr($data, strlen($start));  // Stripping $start
    $stop = stripos($data, $end);   // Getting the position of the $end of the data to scrape
    $data = substr($data, 0, $stop);    // Stripping all data from after and including the $end of the data to scrape
    return $data;   // Returning the scraped data from the function
}

// Defining the basic scraping function
/**
 * @param $data
 * @param $start
 * @param $end
 * @return bool|string
 */
function scrape_exclude($data, $start, $end)
{
    $start = stripos($data, $start);
    $stop = strlen($data) - strripos($data, $end) + 9;
    $data = substr($data, $start, $stop);

    return $data;
}

/**
 * @param $result_titles
 * @param $result_urls
 */
function listUrls($result_titles, $result_urls){
    for ($i = 0; $i < count($result_titles); $i++)
    {
        // removes the last 8 characters of the string
        $result_titles[$i] = substr($result_titles[$i], 0, strlen($result_titles[$i]) - 8);

        echo "<a href=\"$result_urls[$i]\">$result_titles[$i]</a><br>";
    }
}

/**
 * @param $url
 * @param $start
 * @param $stop
 * @param $search
 * @return array
 */
function scrape_into_array($url, $start, $stop, $search)
{
    $scraped_page = curl($url); // Get source code
    $scraped_data = scrape_between($scraped_page, $start, $stop); // remove unwanted

    // explode scraped_data string to an array every time this div is found
    $separate_results = explode($search, $scraped_data);
    array_splice($separate_results, 0, 1); // remove first element of array

    return $separate_results;
}

/**
 * @param $separate_results
 * @return array
 */
function scrape_urls($separate_results)
{
    foreach ($separate_results as $separate_result)
    {
        if ($separate_result != "")
        {
            // save a new array of only the urls
            $result_urls[] = "https://torrenthaja.com/bbs" .
                scrape_between($separate_result, "<a href=\".", "\">");
        }
    }
    return $result_urls;
}

/**
 * @param $separate_results
 * @return array
 */
function scrape_titles($separate_results)
{
    foreach ($separate_results as $separate_result)
    {
        if ($separate_result != "")
        {
            // strip all html tags from each result
            $result_titles[] = strip_tags($separate_result);
        }
    }
    return $result_titles;
}

?>