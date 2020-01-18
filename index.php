<?php 

include_once 'header.php';
?>

<form action="search.php" method="post">
<div class="container">
<div class="row">
<div class="form-group clo-sm-3 col-md-6">
  <label for=""></label>
  <input type="text" name="search" align="center" class="form-control" placeholder="Search">
</div>
</div>
<div class="form-group"> 
  <button type="submit" name="submit-search" class="btn btn-success"> Search </button>

</div>
</div>

</form>

<div class="container">
<h3 class="text-primary ">All Articles</h3>
    <?php 
    $sql = "SELECT * FROM articles";
    $result = mysqli_query($conn, $sql);
    $query_result = mysqli_num_rows($result);

    if($query_result > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<div class='well'>
            <h3>".$row['title']."</h3>
            <p> ".$row['text']." </p>
            <p> ".$row['date']." </p>
            <p> ".$row['author']." </p>   
            </div>
            ";
        }
    }
    
    ?>


</div>

<?php 
include 'footer.php';
?>