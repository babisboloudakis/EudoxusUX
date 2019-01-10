
<?php

    require("header.php");

?>

<div class="d-flex justify-content-center align-items-center" style="padding: 120px;">
    <h1 class="mr-3 pr-3 align-top border-right inline-block align-content-center">404</h1>
    <div class="inline-block align-middle">
        <h2 class="font-weight-normal lead" id="desc">Η σελίδα που ζητήσατε είτε δεν υπάρχει, είτε δεν σχεδιάστηκε στα πλαίσια αυτής της εργασίας.</h2>
        <a href="index.php">Επιστροφή στην αρχική σελίδα</a>
    </div>
</div>


<?php echo file_get_contents("html/footer.html"); ?>