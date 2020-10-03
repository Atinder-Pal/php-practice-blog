<?php
    $GLOBALS['pageTitle'] = 'Atinder\'s Blog';
    $GLOBALS['author'] = 'Atinder';
    //including class file using require_once
    require_once dirname(__FILE__).'/includes/BlogArticle.Class.php';
    require_once dirname(__FILE__).'/includes/RetrieveJsonFile.Class.php';

    // Show our header
    include dirname(__FILE__).'/templates/header.php';

    // An array to store instances of BlogArticle
    $blogArticles = [];
    
    $dataFromJsonFile = new RetrieveJsonFile( './data/articles.json' );       
        if( $dataFromJsonFile->articlesArray )
        {
            foreach( $dataFromJsonFile->articlesArray as $blogArticle )
            {
                array_push($blogArticles,new BlogArticle($blogArticle));                 
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