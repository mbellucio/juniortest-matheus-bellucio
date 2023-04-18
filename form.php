<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body> 
  <form action="includes/submitform.inc.php" method="post">
    <select name="productType">
      <option value="BookController">Book</option>
      <option value="DvdController">DVD</option>
      <option value="FurnitureController">Furniture</option>
      <input type="text" placeholder="sku" name="sku">
      <input type="text" placeholder="name" name="name">
      <input type="text" placeholder="price" name="price">
      <input type="text" placeholder="props" name="properties">
    </select>
    <button type="submit" name="submit">Submit</button>
  </form>

</body>

</html>

