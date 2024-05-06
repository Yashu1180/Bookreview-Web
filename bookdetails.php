
<?php 
 session_start();
?>
<?php
include("header1.php");
?>
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

        if (isset($_GET['bookname'])){
          $service = $_GET['bookname'];
          $_SESSION['bookname'] = $service;
          

       
        // Query to select all images from the table
        $sql = "SELECT * FROM addcategory where bookname='$service' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Retrieve the image data

                $image = $row['image'];
                $bookname = $row['bookname'];
                $authorname = $row['authorname'];
                $description = $row['description'];
                $language = $row['language'];
                $country = $row['country'];
                $genre = $row['genre'];
                $publisher = $row['publisher'];
                $published = $row['published'];


              echo'  <div class="innerf-pages section">';
               echo '<div class="container" style="    margin-top: 79px;">';
                echo    '<div class="col-md-4 single-right-left ">';
                       echo  '<div class="grid images_3_of_2">';
                           echo '<div class="flexslider1">';
                            echo    '<ul class="slides">';
                                  echo  '<li data-thumb="books_images/b1.jpg">';
                                      echo  '<div class="thumb-image">';
                                         echo   '<img src="books_images/' . $image . '" data-imagezoom="true" alt=" " class="img-responsive"> </div>';
                                    
                                echo '</ul>';
                               echo '<div class="clearfix"></div>';
                            echo '</div>';
                        echo '</div>';
    
                    echo '</div>';
                    echo '<div class="col-md-8 single-right-left simpleCart_shelfItem">';
                    echo '<h3>'.$bookname.'</h3>';
                            echo '<span></span>';
                        echo '</h3>';
                        echo '<p>by';
                            echo '<a href="#">'.$authorname.'</a>';
                        echo '</p>';
                        echo '<div class="caption">';
    
                            echo '<style>';
                               echo  'rating-single .fa-star {';
                                    echo 'font-size: 30px;';
                              echo  '}';
                           echo  '</style>';
                            
                            echo '<ul class="rating-single">';
                                echo '<li>';
                                    echo '<a href="#">';
                                        echo '<span class="fa fa-star yellow-star" aria-hidden="true"></span>';
                                    echo '</a>';
                                echo '</li>';
                               echo '<li>';
                                   echo '<a href="#">';
                                       echo '<span class="fa fa-star yellow-star" aria-hidden="true"></span>';
                                    echo '</a>';
                               echo '</li>';
                                echo '<li>';
                                    echo '<a href="#">';
                                       echo '<span class="fa fa-star yellow-star" aria-hidden="true"></span>';
                                   echo '</a>';
                                echo '</li>';
                                echo '<li>';
                                    echo '<a href="#">';
                                       echo '<span class="fa fa-star yellow-star" aria-hidden="true"></span>';
                                    echo '</a>';
                                echo '</li>';
                               echo '<li>';
                                    echo '<a href="#">';
                                      echo  '<span class="fa fa-star yellow-star" aria-hidden="true" style="color: #4f5250;"></span>';
                                   echo '</a>';
                               echo '</li>';
                            echo '</ul>';
                            
                            echo '<div class="clearfix"> </div>';
                            echo '<h6>';
                               echo '</h6>';
                        echo '</div>';
                       echo '<div class="desc_single">';
                            echo '<h5>Description</h5>';
                            echo '<p>'.$description.'</p>';
                        echo '</div>';
                        echo '<div class="occasional">';
                            echo '<h5>Specifications</h5>';
                            echo '<ul class="single_specific">';
                                echo '<li>';
                                   echo '<span>language :</span>'. $language.'</li>';
                               echo '<li>';
                                    echo '<span>country :</span> '. $country.'</li>';
                               echo '<li>';
                                   echo '<span>genre :</span>'. $genre.'</li>';
                                echo '<li>';
                                    echo '<span>Publisher :</span>'.$publisher .'</li>';
                                echo '<li>';
                                    echo '<span>published :</span>'. $published .'</li>';
                            echo '</ul>';
    
                        echo '</div>';
                        // echo '<div class="color-quality">';
                        //    echo '<div class="color-quality-right">';
                        //        echo '<h5>Also Formats avaiable in:</h5>';
                        //         echo '<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">';
                        //             echo '<option value="null">paper back &nbsp;$90.00</option>';
                        //             echo '<option value="null">Audio Book &nbsp;$200.00</option>';
                        //        echo '</select>';
                        //     echo '</div>';
                        // echo '</div>';
                        echo'<h3><button style="    margin-top: 10em;"><a href="review.php?id">Review</a></button></h3>';
                        echo '<div class="clearfix"></div>';
                        echo '<div class="description">';
                            
                            echo '<style>';
                                echo 'input[type="text"] {';
                                    echo 'border: 2px solid #ccc;';
                                    echo 'width: 10px;'; 
                                    echo 'height: 70px;';
                                    echo 'padding: 20px;';
                               echo '}';
                            echo '</style>';
                            
                            
                            
                        echo '</div>';
                        
                   echo '</div>';
                   echo '<div class="clearfix"> </div>';
               echo '</div>';
           echo '</div>';
        }
    } else {
        echo 'No images found in the table.';
    }
  }
    $conn->close();
    ?>

