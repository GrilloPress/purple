<?php
/*
 * 
 * 
 */

$html = file_get_contents('http://www.jobs.nhs.uk/extsearch?client_id=121486&resonly=1&max_result=100'); //get the html returned from the following url

$jobs_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

    $jobs_doc->loadHTML($html);
    libxml_clear_errors(); //remove errors for yucky html

    $pokemon_xpath = new DOMXPath($jobs_doc);

    //get all the h2's with an id
    $pokemon_row = $pokemon_xpath->query('//div[@class="vacancy"]');

    if($pokemon_row->length > 0){
        foreach($pokemon_row as $row){
            echo $row->nodeValue . "<br/>";
        }
    }
}