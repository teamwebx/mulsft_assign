
<?php
require_once "config.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<form action="" method="POST">
            <label>Movie Name</label></br>
            <input name="movie" placeholder="Movie Name" required="" /></br></br>

            <label>Actor Name</label></br>
            <input name="actor" placeholder="Actor Name" required="" /></br></br>

            <label>Actress Name</label></br>
            <input name="actress" type="text" placeholder="Actress Name" /></br></br>

            <label>Year</label></br>
            <input name="year" type="year" placeholder="Year" required="" /></br></br>

            <label>Director Name</label></br>
            <input name="dirname" type="text" placeholder="Director Name" required="" /></br></br>
            <input type="submit" value="Create" name="submit">


        </form>


<?php 

if(isset($_POST['submit']))
  {
    $mymovie=$_POST['movie'];
    $myactor=$_POST['actor'];
    $myactress=$_POST['actress'];
    $myyear=$_POST['year'];
    $mydirname=$_POST['dirname'];
  
   
   

    $sql = "INSERT INTO movies (movie, actor, actress, year, dirname) VALUES ('$mymovie','$myactor','$myactress','$myyear','$mydirname')";
    
    mysqli_query($link,$sql) or die("Querry Error");
   
    if(1)
    {
        echo '<script>alert("Details Sent.")</script>';
        echo "<script> window.location.assign('index.php'); </script>";
    }
   
  }
  
?>


<table border="1px" ; padding="15px" ; style="width:60%;">
<caption>View Actor Table</caption>
        <tr>
            <th>
                Movie Name
            </th>
            <th>
                Actor Name
            </th>
            <th>
                Actress Name
            </th>
            <th>
                Year
            </th>
            <th>
                Director Name
            </th>
            
        </tr>
        <?php
        error_reporting(0);
                   $fetchQuery="SELECT * from movies";
                   mysqli_query($link,$fetchQuery) or die("Querry Error");
                   $run=mysqli_query($link,$fetchQuery);
                   while($row=mysqli_fetch_array($run))
                   {
                   ?>
        <center><tr>
<td><?php echo $row['movie']; ?></td>
<td><?php echo $row['actor']; ?></td>
<td><?php echo $row['actress']; ?></td>
<td><?php echo $row['year']; ?></td>
<td><?php echo $row['dirname']; ?></td>
</tr>
        </center>

        <?php } ?>
</table>

<form action="" method="post">
</br></br><hr>
<input name="actor" placeholder="Actor Name" required="" /></br></br>
<input type="submit" value="submit" name="val">
</form>


<?php 
if(isset($_POST['val']))
  {
    $myactors=$_POST['actor'];
  }
    ?>
<table border="1px" ; padding="15px" ; style="width:60%;">
        <tr>
            <th>
                Movie Name
            </th>
            <th>
                Actor Name
            </th>
            <th>
                Actress Name
            </th>
            <th>
                Year
            </th>
            <th>
                Director Name
            </th>
            
        </tr>
        <?php
        
                   $fetchQuery="SELECT * from movies where actor='$myactors' ";
                   mysqli_query($link,$fetchQuery) or die("Querry Error");
                   $run=mysqli_query($link,$fetchQuery);
                   while($row=mysqli_fetch_array($run))
                   {
                   ?>
        <center><tr>
<td><?php echo $row['movie']; ?></td>
<td><?php echo $row['actor']; ?></td>
<td><?php echo $row['actress']; ?></td>
<td><?php echo $row['year']; ?></td>
<td><?php echo $row['dirname']; ?></td>
</tr>
        </center>

        <?php } ?>
</table>

</body>
</html>