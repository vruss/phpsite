<?php
/**
 * http://83.209.253.180/index.php
 * https://impythonist.wordpress.com/2015/01/06/ultimate-guide-for-scraping-javascript-rendered-web-pages/
 * https://phpbestpractices.org/
 * http://php.net/manual/en/
 * https://medium.com/@stevesohcot/sample-basic-php-template-for-file-structure-with-example-code-47ff6d610191
 */
switch ($_SERVER["SCRIPT_NAME"])
{
    case "/about.php":
        $CURRENT_PAGE = "About";
        $PAGE_TITLE = "About Us";
        break;
    case "/contact.php":
        $CURRENT_PAGE = "Contact";
        $PAGE_TITLE = "Contact Us";
        break;
    case "/mysql.php":
        $CURRENT_PAGE = "MySQL";
        $PAGE_TITLE = "MySQL Tests";
        break;
    default:
        $CURRENT_PAGE = "Index";
        $PAGE_TITLE = "Welcome to my homepage!";
}
?>
