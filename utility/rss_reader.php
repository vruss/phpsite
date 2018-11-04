<?php
//Feed URLs
    $feeds = array(
        "https://avistaz.to/rss/feed?fid=8475&pid=ae93c7fc16a923a6b8270fa3139f5bd1"
    );

//Read each feed's items
    $entries = array();
    foreach ($feeds as $feed)
    {
        $xml = simplexml_load_file($feed);
        $entries = array_merge($entries, $xml->xpath("//item"));
    }

//Sort feed entries by pubDate
usort($entries, function ($feed1, $feed2) {
    return strtotime($feed2->pubDate) - strtotime($feed1->pubDate);
});

?>

<ul><?php
    //Print all the entries
    foreach($entries as $entry){
        ?>
        <li><a href="<?= $entry->link ?>"><?= $entry->title ?></a> (<?= parse_url($entry->link)['host'] ?>)
            <p><?= strftime('%m/%d/%Y %I:%M %p', strtotime($entry->pubDate)) ?></p>
            <p><?= $entry->description ?></p></li>
        <?php
    }
    ?>
</ul>
