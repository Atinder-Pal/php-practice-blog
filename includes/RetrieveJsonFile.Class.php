<?php
class RetrieveJsonFile
{
    public $pathToFile;
    public $articlesArray;
    function __construct ( $pathToFile='' )
    {
        $this->pathToFile = $pathToFile;
    }

    public function retrieveDataFromJson()
    {
        $articlesFileAsString = file_get_contents( $this->pathToFile );
        if ( $articlesFileAsString )
        {
            $this->articlesArray = json_decode( $articlesFileAsString );
        }        
    }
}
// $dataFromJsonFile = new RetrieveJsonFile( './data/articles.json' );
// $dataFromJsonFile->retrieveDataFromJson();
// var_dump( $dataFromJsonFile->articlesArray );