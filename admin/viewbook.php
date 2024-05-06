<?php
session_start();
require_once("dbconfig.php");
?>

<?php
include("header.php");
?>

    <style>
        body {
            overflow-x: hidden;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        
        header {
            background-color:#97dcd3;
            color: white;
            padding: 1px;
            text-align: center;
        }

       
     .service{
        height: 70px;
         width: 400px;
        background-color: #97dcd3;
        border-radius: 100px;
     }



  
div.column {
    height: 119px;
    width: 754px;
    margin-left: 83px;
    outline-style: solid;
    outline-color: #97dcd3;
    background-image: linear-gradient(to top, rgba(255,0,0,0), #97dcd3 190%);
}

    </style>
</head>
<body>

    
    <br><br>
 <center>

 
 <div class="container_display" style="margin-top: 40px;">

<style>
    table, th, td {
        border: 1px solid olivedrab;
        text-align: center;
    }
</style>
<table style="width:97%">
    <tr>
        <th>Id no</th>
        <th>Bookname</th>
        <th>Authorname</th>
        <!-- <th>image</th> -->
        <th>Language</th>
        <th>Country</th>
        <th>Gener</th>
        <th>Publisher</th>
        <th>Published</th>
        <th>Action</th>
    </tr>

    <?php
    // $res = mysqli_query($conn, "SELECT fees FROM developers INNER JOIN user ON developers.fees= user.fees;");
    $res = mysqli_query($conn, "SELECT * FROM addcategory ");

    while ($row = mysqli_fetch_array($res)) {
        echo '<tr>
        <td>' . $row['id'] . '</td>  
        <td>' . $row['bookname'] . '</td> 
        <td>' . $row['authorname']. '</td> 
        
        <td>' .$row['language'] . '</td> 
        <td>' . $row['country']. '</td> 
        <td>' .  $row['genre'] . '</td>  
        <td>' . $row['publisher'] . '</td>  
        <td>' . $row['published'] . '</td> 
        <td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td> <!-- Delete link/button -->
        </tr>';
    }
    ?>
</table>
</div>

  
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>


</body>
</html>