<?php
    //session_start();
<<<<<<< HEAD
    require_once ('../../database/database_functions.php');
    db_connection();
=======
    require_once ('../database/database_functions.php');
    $conn  = db_connection();

    // declaring global variables
    $book_id = array();
    $book_title = array();
    $book_cover = array();
    $author_fn = array();
    $author_ln = array();
    $book_year = array();
    $book_price = array();
    $book_qty = array();
    $grand_total = 0;
    $num_items = 0;

    if (isset($_SESSION['user'])) {
        $userName = $_SESSION['user'];

        // getting customer id
        $sql = "SELECT customer_id FROM user WHERE username = '$userName'";
        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()){
                    $customer = $row['customer_id'];
                }
            } else {
                echo "Error in getting customer id!";
            }

<<<<<<< HEAD
    // Fetching information from cart table based on guest ID or customer ID
    // Add WHERE customer or guest id to select the cart item 
    // For order summary
    $stmt = $conn->prepare("SELECT * FROM cart JOIN book ON book.book_id = cart.book_id 
                            JOIN author_tag ON author_tag.book_id = book.book_id 
                            JOIN author ON author.author_id = author_tag.author_id 
                            WHERE customer_id = $customer");
    $stmt->execute();
    $result = $stmt->get_result();
    $grand_total = 0;
    $num_items = 0;
    while ($row = $result->fetch_assoc()):
        $grand_total += $row['price'];
        $num_items += 1;
    endwhile; 
    // For cart section
    $stmt = $conn->prepare("SELECT * FROM cart JOIN book ON book.book_id = cart.book_id 
                            JOIN author_tag ON author_tag.book_id = book.book_id 
                            JOIN author ON author.author_id = author_tag.author_id 
                            WHERE customer_id = $customer");
    $stmt->execute();
    $result = $stmt->get_result();
>>>>>>> 8664fbcf48f6050765beefb90493ce7c794337f1
=======
            // For order summary
            $stmt = $conn->prepare("SELECT * FROM cart JOIN book ON book.book_id = cart.book_id 
                                    JOIN author_tag ON author_tag.book_id = book.book_id 
                                    JOIN author ON author.author_id = author_tag.author_id 
                                    WHERE customer_id = $customer");
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()):
                array_push($book_id,$row['book_id']);
                array_push($book_title,$row['book_title']);
                array_push($book_cover,$row['book_cover']);
                array_push($author_fn,$row['author_first_name']);
                array_push($author_ln,$row['author_last_name']);
                array_push($book_year,$row['publishing_year']);
                array_push($book_price,$row['price']);
                array_push($book_qty,$row['quantity']);

                $grand_total += $row['total_price'];
                $num_items += 1;

            endwhile; 
            /*// For cart section
            $stmt = $conn->prepare("SELECT * FROM cart JOIN book ON book.book_id = cart.book_id 
                                    JOIN author_tag ON author_tag.book_id = book.book_id 
                                    JOIN author ON author.author_id = author_tag.author_id 
                                    WHERE customer_id = $customer");
            $stmt->execute();
            $result = $stmt->get_result();*/

    } 
    else {

        echo 'You have not log in';
        // querry information from session!
        $max = sizeof($_SESSION['book_id']);

        if ($max > 0) {
            for ($x=0;$x<$max;$x++) {

                $guest_bookID = $_SESSION['book_id'][$x];
                $guest_bookQTY = $_SESSION['book_qty'][$x];
            
                $stmt = $conn->prepare("SELECT * FROM book 
                                        JOIN author_tag ON author_tag.book_id = book.book_id 
                                        JOIN author ON author.author_id = author_tag.author_id 
                                        WHERE book.book_id = $guest_bookID");
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();


                array_push($book_title,$row['book_title']);
                array_push($book_cover,$row['book_cover']);
                array_push($author_fn,$row['author_first_name']);
                array_push($author_ln,$row['author_last_name']);
                array_push($book_year,$row['publishing_year']);
                array_push($book_price,$row['price']);
                array_push($book_qty,$guest_bookQTY);

                $grand_total += $row['price'];
                $num_items += 1;
            }
        } else {
            echo "Nothing in cart!";
        }
            

    }
>>>>>>> c5fae8f1d2c16caedbf4053dd76f11e60810ff66
?>

<div class="container" style="margin-top:100px;">

    <!-- Order Summary Section -->
    <div class="row">
        <div class="col-4" style="">
            <div class="row">
                <div class="col">
                <div class="bg-light rounded-pill px-4 py-3 font-weight-bold">Order summary </div>
                    <div class="p-4">
                        <ul class="list-unstyled mb-4">
                                <?php
                                    // Fetching information from cart table based on guest ID or customer ID
                                    require_once '../../database/database_functions.php';
                                    $conn = db_connection();
                                    // Add WHERE customer or guest id to select the cart item 
                                    $stmt = $conn->prepare("SELECT * FROM cart 
                                            JOIN book ON book.book_id = cart.book_id 
                                            JOIN author_tag ON author_tag.book_id = book.book_id 
                                            JOIN author ON author.author_id = author_tag.author_id 
                                            WHERE customer_id = 1");
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $grand_total = 0;
                                    $num_items = 0;
                                    while ($row = $result->fetch_assoc()):
                                        $grand_total += $row['price'];
                                        $num_items += 1;
                                    endwhile; 
                                ?>
                        <li class="d-flex justify-content-between py-3 border-bottom">
                            <strong class="text-muted" id="cart-number">Number of positions </strong>
                            <strong><?= number_format($num_items,0) ?></strong></li>
                        <li class="d-flex justify-content-between py-3 border-bottom">
                            <strong class="text-muted" id="cart-total">Total</strong>
                            <h5 class="font-weight-bold"><b><i class="fas fa-euro-sign"></i>
                            &nbsp; <?= number_format($grand_total,2) ?></b></h5>
                        </li>
<<<<<<< HEAD
                        </ul><a href="../../public/check_out.php" class="btn btn-warning rounded-pill py-2 btn-block">Procceed to checkout</a>
=======
                        <?php 
                            if (isset($_SESSION['user'])) {
                        ?>
                        </ul><a href="check_out.php" class="btn btn-warning rounded-pill py-2 btn-block">Procceed to checkout</a>
                        <?php
                            }
                        ?>
                        <?php 
                            if (!isset($_SESSION['user'])) {
                        ?>
                        </ul><a href="signup_login.php" class="btn btn-warning rounded-pill py-2 btn-block">Login or Register</a>
                        <?php
                            }
                        ?>
>>>>>>> 8664fbcf48f6050765beefb90493ce7c794337f1
                    </div>
                </div>
            </div>
        </div>

        <!-- My Cart Section -->
        <div class="col-8">
            <div class="container catalog-breadcrumbs">
                <a href="cart.php"> My Cart </a> 
            </div>
            <div id="message"></div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table" >
                        <tbody >
<<<<<<< HEAD
                                <?php
                                    // Fetching information from cart table 
                                    require_once '../../database/database_functions.php';
                                    $conn = db_connection();
                                    $stmt = $conn->prepare("SELECT * FROM cart");
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $grand_total = 0;
                                    while ($row = $result->fetch_assoc()):
                                ?>
                            <tr >
=======
                                <?php for ($x = 0; $x < count($book_title); $x++) { ?> <!-- for fetching the session array this should be consider to change! -->
                            <tr>
>>>>>>> c5fae8f1d2c16caedbf4053dd76f11e60810ff66
                            <th scope="row" class="border-0" >
                                <div class="p-2">
                                <img src="../assets/img/book-covers/<?= $book_cover[$x] ?>" alt="book" width="100px" id="book-cover">
                                <div class="ml-3 d-inline-block align-middle">
                                    <a href="#" class="text-dark"><div class="book-title" id="book-title">"<?= $book_title[$x] ?>", <?= $author_fn[$x], $author_ln[$x] ?> (<?= $book_year[$x] ?>)</div></a>
                                </div>
                                </div>
                            </th>
                            <td class="border-0 align-middle book-price bg-transparent"  
                                id="book-price"><strong><i class="fas fa-euro-sign">&nbsp;<?= $book_price[$x] ?></i></strong></td>
                            <td class="border-0 align-middle book-price bg-transparent"  
                                id="book-quantity"><input type="number" class="form-control itemQty" value="<?= $book_qty[$x] ?>" style="width:75px;"><strong></strong></td>
                            <td class="border-0 align-middle book-price book-price bg-transparent" >
                                <a href="add_cart.php?remove=<?=$book_id[$x]?>" class="text-danger" onclick="return confirm('Are you sure you want to remove this item?');"> <em class="fa fa-trash dlt-cart-btn"></em></a></td>
                            <td class="border-0 align-middle book-price book-price bg-transparent" >
                                <em class="fas fa-heart add-wishlist-btn" id="wishlist-<?php echo $book_id[$x]?>"></em>
                            </td>

                            </tr>
                                <?php } $conn->close(); ?>
                            
                        </tbody>
                    </table>
                </div> 
            </div>
        </div>
    </div>
</div>