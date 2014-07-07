<!-- http://simplehtmldom.sourceforge.net/

// Create DOM from URL or file
$html = file_get_html('http://www.google.com/');

// Find all images 
foreach($html->find('img') as $element) 
       echo $element->src . '<br>';

// Find all links 
foreach($html->find('a') as $element) 
       echo $element->href . '<br>';
       
 !-->

<?php

PHP Simple HTML DOM Parser, written in PHP5+, allows you to manipulate HTML in a very easy way. Supporting invalid HTML, this parser is better then other PHP scripts that use complicated regexes to extract information from web pages.
Before getting the necessary info, a DOM should be created from either URL or file. The following script extracts links & images from a website:

// Create DOM from URL or file
$html = file_get_html('http://www.microsoft.com/');

// Extract links
foreach($html->find('a') as $element)
       echo $element->href . '<br>'; 

// Extract images
foreach($html->find('img') as $element)
       echo $element->src . '<br>';


The parser can also be used to modify HTML elements:

// Create DOM from string
$html = str_get_html('<div id="simple">Simple</div><div id="parser">Parser</div>');

$html->find('div', 1)->class = 'bar';

$html->find('div[id=simple]', 0)->innertext = 'Foo';

// Output: <div id="simple">Foo</div><div id="parser" class="bar">Parser</div>
echo $html;

Do you wish to retrieve content without any tags?

echo file_get_html('http://www.yahoo.com/')->plaintext;

In the package files of this parser (http://simplehtmldom.sourceforge.net/) you can find some scraping examples from digg, imdb, slashdot. Let’s create one that extracts the first 10 results (titles only) for the keyword “php” from Google:

$url = 'http://www.google.com/search?hl=en&q=php&btnG=Search';

// Create DOM from URL
$html = file_get_html($url);

// Match all 'A' tags that have the class attribute equal with 'l'
foreach($html->find('a[class=l]') as $key => $info) 
{
echo ($key + 1).'. '.$info->plaintext."<br />\n";
}

NOTE Make sure to include the parser before using any functions of it:

include 'simple_html_dom.php';
?>

For more information regarding the usage of this function consider checking the ‘PHP Simple HTML Dom Parser’ Manual. To download the package files use the following URL: http://sourceforge.net/project/showfiles.php?group_id=218559.
- See more at: http://www.bitrepository.com/php-simple-html-dom-parser.html#sthash.ytTsKgrE.dpuf