<?php
    $GLOBALS['pageTitle'] = 'Atinder\'s Blog';
    $GLOBALS['author'] = 'Atinder';
    //including class file using require_once
    require_once dirname(__FILE__).'/includes/BlogArticle.Class.php';
    require_once dirname(__FILE__).'/includes/RetrieveJsonFile.Class.php';

    // Show our header
    include dirname(__FILE__).'/templates/header.php';
    // ===============Search Functionality===============
    if ( !empty($_GET ))
    {
       $searchTerm = strtolower($_GET['searchTitle']);
    }
    // ==================================================
    // An array to store instances of BlogArticle
    $blogArticles = [];
    
    $dataFromJsonFile = new RetrieveJsonFile( './data/articles.json' );       
        if( $dataFromJsonFile->articlesArray )
        {
            foreach( $dataFromJsonFile->articlesArray as $blogArticle )
            {
                // ===============Search Functionality===============
                if ( !empty($_GET ))
                {
                    if ( strtolower($blogArticle->title) == $searchTerm )
                    {
                        array_push($blogArticles,new BlogArticle($blogArticle));
                    }
                }
                // ==================================================
                else
                {
                    array_push($blogArticles,new BlogArticle($blogArticle));
                }
                                 
            }            
        }  
?>

<p><strong> Here you can see <?php echo $GLOBALS['author']; ?>'s favorite blogs.</strong></p>
<form method= "GET" action="index.php">
    <label for="searchTerm">
        Search for Blogs by Title:
        <input id="searchTerm" type="text" name="searchTitle" value="">
    </label>
    <input type="submit" value="Search">    
</form>
<!-- Another form to submit request for all blog posts -->
<form action="index.php" method="GET">
    <input type="submit" value="Get all blog posts">
</form>

<?php if ( !empty( $blogArticles )) : ?>
    <?php foreach( $blogArticles as $blogArticle ) $blogArticle->displayBlogArticle(); ?>
<?php else : ?>
    <p>Sorry, no blogs to display!</p>
<?php endif; ?>

<?php
    // Show our footer
    include dirname(__FILE__).'/templates/footer.php';
?>