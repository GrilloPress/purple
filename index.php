<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <div class="container">
      <div class="row">
            <?php

            include 'simple_html_dom.php'; // includes the library

            $html = file_get_html('http://www.jobs.nhs.uk/extsearch?client_id=121486&resonly=1&max_result=100'); //gets the webpage and puts it inside the $html variabable

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

            // find all the outer divs, add a col-12 and print it out
            foreach($html->find('div[class=vacancy]') as $element){
              echo "<div class='col-md-12'>" . $element . "</div>" ; 
            }

            ?>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>