<?php 

include_once 'header.php';
?>

<div class="container">
<h3 class="text-primary ">Read Articles</h3>
    <?php 

    $title =mysqli_real_escape_string($conn, $_GET['title']);

    $sql = "SELECT * FROM articles WHERE title = '$title'";
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