<div class="container">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link <?php if ($CURRENT_PAGE == "Index") {?>active<?php }?>" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($CURRENT_PAGE == "About") {?>active<?php }?>" href="about.php">About Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($CURRENT_PAGE == "Contact") {?>active<?php }?>" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($CURRENT_PAGE == "Scrape") {?>active<?php }?>" href="scrape.php">Scrape</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($CURRENT_PAGE == "MySQL") {?>active<?php }?>" href="mysql.php">MySQL</a>
        </li>
    </ul>
</div>
