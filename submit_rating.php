<?php
session_start();
$connect = new PDO("mysql:host=localhost;dbname=bookreview", "root", "");
$book_name = $_SESSION['bookname'];
if(isset($_POST["rating_data"]))
{
    $data = array(
		':book_name' => $book_name,
        ':user_name'    =>  $_POST["user_name"],
        ':user_rating'  =>  $_POST["rating_data"],
        ':user_review'  =>  $_POST["user_review"],
        ':datetime'     =>  time()
    );

    $query = "
    INSERT INTO review_table 
    (book_name, user_name, user_rating, user_review, datetime) 
    VALUES (:book_name, :user_name, :user_rating, :user_review, :datetime)
    ";

    $statement = $connect->prepare($query);

    $statement->execute($data);

    echo "Your Review & Rating Successfully Submitted";
}

if(isset($_POST["action"]))
{
    $average_rating = 0;
    $total_review = 0;
    $five_star_review = 0;
    $four_star_review = 0;
    $three_star_review = 0;
    $two_star_review = 0;
    $one_star_review = 0;
    $total_user_rating = 0;
    $review_content = array();

    // Check if review_id is provided in the AJAX request
    if(isset($_POST["review_id"])) {
        $query = "
        SELECT * FROM review_table 
        WHERE review_id = :review_id
        ";
        $statement = $connect->prepare($query);
        $statement->bindParam(':review_id', $_POST["review_id"]);
        $statement->execute();
    } else {
		
        // If review_id is not provided, fetch all reviews
        $query = " SELECT * FROM review_table where book_name='$book_name' ";
        $statement = $connect->query($query, PDO::FETCH_ASSOC);
    }

    foreach($statement as $row)
    {
        $review_content[] = array(
            'user_name'     =>  $row["user_name"],
            'user_review'   =>  $row["user_review"],
            'rating'        =>  $row["user_rating"],
            'datetime'      =>  date('l jS, F Y h:i:s A', $row["datetime"])
        );

        // Count stars based on user rating
        switch ($row["user_rating"]) {
            case '5':
                $five_star_review++;
                break;
            case '4':
                $four_star_review++;
                break;
            case '3':
                $three_star_review++;
                break;
            case '2':
                $two_star_review++;
                break;
            case '1':
                $one_star_review++;
                break;
        }

        $total_review++;
        $total_user_rating += $row["user_rating"];
    }

    // Calculate average rating
    $average_rating = ($total_review > 0) ? ($total_user_rating / $total_review) : 0;

    // Prepare output data
    $output = array(
        'average_rating'    =>  number_format($average_rating, 1),
        'total_review'      =>  $total_review,
        'five_star_review'  =>  $five_star_review,
        'four_star_review'  =>  $four_star_review,
        'three_star_review' =>  $three_star_review,
        'two_star_review'   =>  $two_star_review,
        'one_star_review'   =>  $one_star_review,
        'review_data'       =>  $review_content
    );

    echo json_encode($output);
}

?>
