<?php

/*
 * To change this template use Tools | Templates.
 */

include 'simple_html_dom.php'; // includes the library

$html = file_get_html('http://www.jobs.nhs.uk/extsearch?client_id=121486&resonly=1&max_result=100'); //gets the webpage and puts it inside the $html variabable

// Remove the add job to favourites link
foreach ($html->find('a[class=jobBasket]') as $x) {
  $x->outertext = '';
}

// find all the links and add the jobs bit onto it
foreach ($html->find('a[href]') as $a) {
$href = $a->href;
    $a->href = 'http://www.jobs.nhs.uk'.$href;
}

// find all the outer divs, add a col-12 and print it out
foreach($html->find('div[class=vacancy]') as $element){
    echo "<div class='col-md-12'>" . $element . "</div>" ; 
}