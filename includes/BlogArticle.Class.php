<?php
    class BlogArticle
    {
        // creating constructor for this class
        function __construct ( $articleObject )
        {
            $this->id = (integer)$articleObject->id;
            $this->title = $articleObject->title;
            $this->content = $articleObject->content;
        }

        //Method to display article
        public function displayBlogArticle()
        {
            ?>
            <h2><?php echo $this->title; ?></h2>
            <p><?php echo $this->content; ?></p>
            <?php
        }
    }
    // $newBlogArticle = new stdClass();
    // $newBlogArticle->id = 23456;
    // $newBlogArticle->title = 'Atinder title';
    // $newBlogArticle->content = 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.';

    // $myBlogArticle = new BlogArticle( $newBlogArticle );
    // $myBlogArticle->displayBlogArticle();