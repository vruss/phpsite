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
    <h1>Scraping!</h1>
    <p>Currently experimenting with cURL scraping...</p>

    <div class="scrape">
        <?php include "utility/scrape.php" ?>
        <?php
        $url = "https://torrenthaja.com/bbs/search.php?search_flag=search&stx=mr+sunshine";
        $separate_results = scrape_into_array($url, "<tbody>", "</tbody>", "<tr>");

        $scraped_titles = scrape_titles($separate_results);
        $scraped_urls = scrape_urls($separate_results);

        listUrls($scraped_titles, $scraped_urls);

        echo "<br>";
        ?>
    </div>
    <br>
</div>

<?php include("includes/footer.php"); ?>

</body>
</html>