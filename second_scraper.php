<?php 
/*
 * 
 * This function uses the simple html dom lib to download the nhs.jobs job postings
 * It then goes through that HTML and then reformats it to be approximately good enough
 * 
 * 
 * @package STH
 * 
 * 
*/ 

function sth_job_feed() {
  
            require 'simple_html_dom.php'; // includes the library
  
            
            $website = "http://www.jobs.nhs.uk/extsearch?client_id=121486&resonly=1&max_result=100";
            $html = new simple_html_dom();
            $html->load_file($website); //gets the webpage and puts it inside the $html variabable
            
            // Remove the add job to favourites link
            foreach ($html->find('a[class=jobBasket]') as $x) {
              $x->outertext = '';
            }
            // Remove the STH name drop
            foreach ($html->find('p[class=agency]') as $x) {
              $x->outertext = '';
            }
            // 
            foreach ($html->find('div[class=vacancy-summary]') as $x) {
              $x->class = 'row vacancy-summary';
            }
            // 
            foreach ($html->find('div[class=left]') as $x) {
              $x->class = 'left col-md-6';
            }
            // 
            foreach ($html->find('div[class=right]') as $x) {
              $x->class = 'right col-md-6';
            }
            // find all the links and add the jobs URL onto it
            foreach ($html->find('a[href]') as $a) {
              $href = $a->href;
              $a->href = 'http://www.jobs.nhs.uk'.$href;
            }
  
            foreach($html->find('div[class=vacancy]') as $element){




            }
  
              $links = array();
              foreach($html->find('a') as $a) {
               $links[] = $a->href;
               $a->class = 'HI THERE';
              }
  
            
  
            // find all the outer divs, add a col-12 and print it out
            foreach($html->find('div[class=vacancy]') as $element){
              $element->class = 'vacancy well';   
              echo "<div class='col-md-12'>" . $element . "</div>" ; 
            }
  
};