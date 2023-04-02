<?php
$connection =mysqli_connect('localhost','root','','library');

if(!$connection) die();
if(isset($_GET['filters_submit'])){
$author=$_GET['author'];
$category=$_GET['category'];
$numOfPages=(int)$_GET['numOfPages'];
$minPrice=(int)$_GET['minPrice'];
$maxPrice=(int)$_GET['maxPrice'];
$orderBy=$_GET['orderBy'];

if($orderBy=="default"){
    $sql="SELECT * FROM books
    WHERE author LIKE '%${author}%'
    && category LIKE '%${category}%'
    && numOfPages <= ${numOfPages}
    && price >=${minPrice}
    && price<${maxPrice}
    ORDER BY price ${orderBy}";
}

}
if(isset($_GET['search_form'])){
    $search=$_GET['search'];

    $sql="SELECT * FROM books
    WHERE author LIKE '%${search}%'
    OR title LIKE '%${search}%'
    OR category LIKE '%${search}%'";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
</head>
<body>
  <div class="filters">
    <form action="./index.php" method="GET">
        <select name="author" id="">
        <option value="">Choose Author</option>
            <option value="JRR Tolkien">JRR Tolkien</option>
            <option value="Jane Austen"> Jane Austen</option>
            <option value="Philip Pullman">Philip Pullman</option>
        </select>
        <br>
        <select name="category" id="">
        <option value="">Choose Category</option>
            <option value="Fiction">Fiction</option>
            <option value="Psychology">Psychology</option>
            <option value="Story">Story</option>
        </select>
        <br>
        <select name="numOfPages" id="">
        <option value="10000">Choose numOfPages</option>
            <option value="200">200</option>
            <option value="500">500</option>
            <option value="1000">1000</option>
</select>
            <br>
            <input type="number" name="minPrice" placeholder="Min. Price" value="0" min="0">
            <input type="number" name="maxPrice" placeholder="Max. Price" value="10000" min="0" max="10000">

            <br>
            <<select name="orderBy">

<option value="default">Default</option>

<option value="ASC">ASC</option>

<option value="DESC">DESC</option>

</select>



<button type="submit" name="filters_submit" value="on">Set filters</button>
        
    </form>
    <form action="./index.php" method="GET">

      <input type="text" name="search" required>

      <button name="search_form" value="Search">Search</button>

    </form>
    <div class="books">
        <?php
        $sql="SELECT * FROM books";
        $result=mysqli_query($connection,$sql);

        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                echo "<p> ${row['author']} ${row['title']} ${row['category']} ${row['numOfPage']} ${row['price']}";
            
            }
        }else{
            echo '<p>No books at the moment</p>';
        }?>
    </div>
  </div>  
</body>
</html>