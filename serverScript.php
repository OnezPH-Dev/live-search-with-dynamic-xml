<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("dynamicXML.xml");

$x=$xmlDoc->getElementsByTagName('link');

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('company');
    $z=$x->item($i)->getElementsByTagName('product');
    $prices=$x->item($i)->getElementsByTagName('prices');
    $image=$x->item($i)->getElementsByTagName('image');
    $url=$x->item($i)->getElementsByTagName('url');
    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($z->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint="<b>Company: </b>" .
          $y->item(0)->childNodes->item(0)->nodeValue .
          "<br><b>Product: </b>" .
          $z->item(0)->childNodes->item(0)->nodeValue .
          "<br><b>Prices: </b>" .
          $prices->item(0)->childNodes->item(0)->nodeValue .
          "<br><img src='" .
          $image->item(0)->childNodes->item(0)->nodeValue .
          "'alt='Product Image'><br><b>URL: </b>" .
          $url->item(0)->childNodes->item(0)->nodeValue;
        } else {
          $hint=$hint . "<br /><a href='" .
          $z->item(0)->childNodes->item(0)->nodeValue .
          "' target='_blank'>" .
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}

//output the response
echo $response;
?>