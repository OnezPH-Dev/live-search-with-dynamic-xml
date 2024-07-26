<html lang="en">
<head>
    <title>DynamicXML</title>
</head>
<body>
<?php
if(isset($_POST['send'])){
  $xml = new DOMDocument("1.0", "UTF-8");
  $xml -> load("dynamicXML.xml");

  $rootTag = $xml -> getElementsByTagName("pages") -> item(0);

  $linkTag = $xml -> createElement("link");
  $companyTag = $xml -> createElement("company", $_POST['company']);
  $productTag = $xml -> createElement("product", $_POST['product']);
  $pricesTag = $xml -> createElement("prices", $_POST['prices']);
  $imageTag = $xml -> createElement("image", $_POST['image']);
  $urlTag = $xml -> createElement("url", $_POST['url']);

  // group member
  $m1Tag = $xml -> createElement("member", "Tolentino, Wilzen Carl Ramos.");
  $m2Tag = $xml -> createElement("member", "Miranda, Alfred Lumabao.");
  $m3Tag = $xml -> createElement("member", "Marcelo, Rose Camille DelosReyes.");


  $linkTag -> appendChild($companyTag);
  $linkTag -> appendChild($productTag);
  $linkTag -> appendChild($pricesTag);
  $linkTag -> appendChild($imageTag);
  $linkTag -> appendChild($urlTag);
  
  $rootTag -> appendChild($linkTag);

  $rootTag -> appendChild($m1Tag);
  $rootTag -> appendChild($m2Tag);
  $rootTag -> appendChild($m3Tag);

  

  $xml -> save("dynamicXML.xml");
}
?>
<form action="index.php" method="post">
  <label for="company">Choose a company : </label>
  <select name="company" id="company">
    <optgroup label="Company">
      <option value="Amazon">Amazon</option>
      <option value="Alibaba">Alibaba</option>
      <option value="eBay">eBay</option>
      <option value="Walmart">Walmart</option>
      <option value="Groupon">Groupon</option>
      <option value="Macys">Macys</option>
      <option value="Samsung">Samsung</option>
      <option value="IKEA">IKEA</option>
      <option value="LTT Store">LTT Store</option>
      <option value="Chewy">Chewy</option>
    </optgroup>
  </select>
  <br>
  <br>
  <label for="product">Product : </label>
  <input id="product" type="text" name="product">
  <br>
  <br>
  <label for="prices">Prices : </label>
  <input id="prices" type="number" name="prices">
  <br>
  <br>
  <label for="image">Image : </label>
  <input id="image" type="file" name="image">
  <br>
  <br>
  <label for="url">URL : </label>
  <input id="url" type="url" name="url">
  <br>
  <br>
  <input name="send" type="submit" value="Submit">
</form>
</body>
</html>