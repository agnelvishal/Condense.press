<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Timeline</title>
  <link rel="stylesheet" href="css/style.css">
  <style>


</style>
</head>

<body>
  <header>
    <div class="headerContainer">
      <h1 class="logo"> condense<span>.press</span> </h1>
    
    </div>
  </header>

    <form id="req" target="aviframe" action="db.php" method="post">
      Here are the articles of
      <select name="site"> <option value="www.bbc.com">www.bbc.com</option><option value="www.yourstory.com">www.yourstory.com</option></select> 
sorted by popularity from 
      <input type="date" name="fromDate" value=2018-04-28 > to
      <input type="date" name="toDate" value="2018-04-29" >.
   
      <input type="submit" value="Submit" style="visibility: hidden;">
    </form>
  

<div class="iframe-container">
<iframe id="aviframe" name="aviframe" align="bottom"  frameborder="0" allowfullscreen>
</iframe>
</div>

 <script src="./js/autoSubmit.js"></script>
</body>

</html>
