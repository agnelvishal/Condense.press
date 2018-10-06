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
      <select name="site"> <option value="www.yourstory.com">www.yourstory.com</option></select> 
from 
      <input type="date" name="fromDate" value=2018-04-28 > to
      <input type="date" name="toDate" value="2018-04-29" >. Display as
      <select name="output" class="dropdown">
        <option value="timeline">timeline</option>
        <option value="chart">chart</option>
      </select>
      <input type="submit" value="Submit" style="visibility: hidden;">
    </form>
  


<iframe id="aviframe" name="aviframe" align="bottom" width="1400" height="1000" frameborder="0" allowfullscreen>

</iframe>
 <script src="./js/autoSubmit.js"></script>
</body>

</html>
