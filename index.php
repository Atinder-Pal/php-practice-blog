<?php
    $GLOBALS['pageTitle'] = 'Atinder\'s Blog';
    $GLOBALS['author'] = 'Atinder';
    //including class file using require_once
    require_once dirname(__FILE__).'/includes/BlogArticle.Class.php';

    // Show our header
    include dirname(__FILE__).'/templates/header.php';

    // An array to store instances of BlogArticle
    $blogArticles = [];
    //Retrieve json file contents in a variable as a string
    $articlesFileAsString = file_get_contents( dirname(__FILE__).'/data/articles.json' );
    //var_dump( $articlesFileAsString ); 
    if ( $articlesFileAsString )
    {
        $articlesArray = json_decode( $articlesFileAsString );
        //var_dump( $articlesArray );
        if( $articlesArray )
        {
            foreach( $articlesArray as $blogArticle )
            {
               array_push($blogArticles,new BlogArticle($blogArticle));                 
            }            
        }
    }

?>

<p><strong> Here you can see <?php echo $GLOBALS['author']; ?>'s favorite blogs.</strong></p>
<?php if ( !empty( $blogArticles )) : ?>
    <?php foreach( $blogArticles as $blogArticle ) $blogArticle->displayBlogArticle(); ?>
<?php else : ?>
    <p>Sorry, no blogs to display!</p>
<?php endif; ?>

<?php
    // Show our footer
    include dirname(__FILE__).'/templates/footer.php';
?>