<?php 

include_once 'header.php';
?>

<div class="container">
<?php 
if(isset($_POST['submit-search'])){
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT * FROM articles WHERE title like '%$search%' OR text like '%$search%' OR author like '%$search%' OR date like '%$search%' ";
    $result = mysqli_query($conn, $sql);
    $queryresult = mysqli_num_rows($result);
    echo "<h2 class='text-success'> There are $queryresult results! for your search keyword <b>$search</b></h2>";

    if ($queryresult > 0) {
        while($row=mysqli_fetch_array($result)){
            echo "<a href='article.php?title=".$row['title']."&date=".$row['date']."' ><div class='well'>
            <h3>".$row['title']."</h3></a>
            <p> ".$row['text']." </p>
            <p> ".$row['date']." </p>
            <p> ".$row['author']." </p>   
            </div>
            ";
        }
    }else{
        echo "<div class='container-fluid'>
        
        <h3 class='text-dark'> Sorry no result found for <strong>$search </strong> keyword, please try with different keyword</h3>
        <figure>
        <img src='https://www.please.pics/images/quotes/english/general/i-am-sorry-please-forgive-52650-23591.jpg'>
        </img>
        </figure>
        
        </div>";
    }
}

?>

</div>