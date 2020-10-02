<?php
    $GLOBALS['pageTitle'] = 'Atinder\'s Blog';
    $GLOBALS['author'] = 'Atinder';
    // Show our header
    include dirname(__FILE__).'/templates/header.php';
?>

<p>Here you can see <?php echo $GLOBALS['author']; ?>'s favorite blogs.</p>

<?php
    // Show our footer
    include dirname(__FILE__).'/templates/footer.php';
?>