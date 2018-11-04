<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>
<body>

<?php include("includes/design-top.php"); ?>
<?php include("includes/navigation.php"); ?>

<div class="container" id="main-content">
    <h1>Welcome to my website!</h1>
    <h5>The header, navigation and footer is dynamically created using PHP!</h5>
    <p>Currently experimenting with cURL scraping...</p>

    <div class="scrape">
        <?php include "utility/scrape.php" ?>
        <?php
        $url = "https://torrenthaja.com/bbs/search.php?search_flag=search&stx=mr+sunshine";
        $separate_results = scrape_into_array($url, "<tbody>", "</tbody>", "<tr>");

        $scraped_titles = scrape_titles($separate_results);
        $scraped_urls = scrape_urls($separate_results);

//        print_r($scraped_urls);

//        foreach ($scraped_urls as $scraped_url)
//        {
//            $torrent_page = curl($scraped_url);
//            $torrent_results = scrape_between($scraped_url, "<tfoot>", "</tfoot>");
//        }

//        echo $scraped_urls[0];
//        $torrent_page = curl($scraped_urls[0]);
//        $torrent_results = scrape_between($scraped_urls[0], "<tfoot>", "</tfoot>");
//        echo $torrent_page;

        //        $torrent_page = curl($scraped_url[0]);

                listUrls($scraped_titles, $scraped_urls);

        //        echo $result_titles[0] . "<br><br><br>";
        //        print_r($result_titles);
        echo "<br>";
        ?>
    </div>
    <br>
</div>

<?php include("includes/footer.php"); ?>

</body>
</html>