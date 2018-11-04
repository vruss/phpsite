<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
    <?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>

<div class="container" id="main-content">
    <h2>Webserver specifications</h2>
    <p>The website is hosted on a Ubuntu Server 18.04 LTS running an Apache2 server with PHP7.2 and cURL support.</p>

    <?php include("includes/server-info.php");?>
    <br>
    <?php include ("utility/rss_reader.php");?>
</div>

<?php include("includes/footer.php");?>

</body>
</html>