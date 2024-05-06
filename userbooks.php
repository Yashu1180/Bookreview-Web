<?php 
session_start();
?>
<?php
include("header1.php");
?>

<body>

    <section class="home">

        <?php

        // Database connection
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'bookreview';

        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM addcategory";
        $result = $conn->query($sql);

        echo '<div class="innerf-pages section" style="text-align: center;">';
        echo '<div class="container-cart">';
        echo '<div class="left-ads-display col-md-9">';
        echo '<div class="wrapper_top_shop">';
        echo '<div class="product-sec1">';

        $counter = 0;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $image = $row['image'];
                $bookname = $row['bookname'];
                $authorname = $row['authorname'];
                $id = $row['id'];

                if ($counter % 4 == 0) {
                    echo '<div class="row" style="    background-color: white;">';
                }

                echo '<div class="col-md-3 product-men" style="margin-top: 20px;">';
                echo '<div class="product-chr-info chr">';
                echo '<div class="thumbnail">';
                echo '<a href="bookdetails.php?bookname=' . $bookname . '">';
                echo '<img style="height:230px;" src="books_images/' . $image . '" alt="Book Image">';
                echo '</a>';
                echo '</div>';
                echo '<div class="caption">';
                echo '<h4>' . $bookname . '</h4>';
                echo '<p>by ' . $authorname . '</p>';
                echo '<div class="matrlf-mid">';
                echo '<ul class="rating">';
                // Your star ratings code here
                echo '</ul>';
                echo '<div class="clearfix"> </div>';
                echo '</div>';
                echo '<form action="#" method="post">';
                echo '<input type="hidden" name="cmd" value="_cart">';
                echo '<input type="hidden" name="add" value="1">';
                echo '<input type="hidden" name="chr_item" value="Book1">';
                echo '<input type="hidden" name="amount" value="100.00">';
                echo '<button type="button" class="chr-cart pchr-cart" style="background-color: #3DA768;">add to favourite</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

                if ($counter % 4 == 3) {
                    echo '</div>'; // Close the row
                }

                $counter++;
            }
        }

        // Close any open row div
        if ($counter % 4 != 0) {
            echo '</div>';
        }

        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        $conn->close();
        ?>
    </section>

</body>

</html>
