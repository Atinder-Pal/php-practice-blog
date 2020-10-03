<?php
class RetrieveJsonFile
{    
    public $articlesArray;
    function __construct ( $pathToFile='' )
    {
        $this->articlesArray = $this->retrieveDataFromJson( $pathToFile );
    }

    public function retrieveDataFromJson( $pathToFile )
    {
        $articlesFileAsString = file_get_contents( $pathToFile );
        if ( $articlesFileAsString )
        {
            $blogPosts = json_decode( $articlesFileAsString );
        }    
        return $blogPosts; 
    }
}
// $dataFromJsonFile = new RetrieveJsonFile( './data/articles.json' );
// $dataFromJsonFile->retrieveDataFromJson();
// var_dump( $dataFromJsonFile->articlesArray );