<?php 
require_once("../templates/header.php");

$user_name = $_SESSION['user'];
            
            // TODO select customer table WHERE username = username
            $customer_query = "SELECT * FROM customer 
            INNER JOIN user 
            ON customer.customer_id=user.customer_id
             WHERE username='$user_name'"; 
            $customer_result = mysqli_query($conn, $customer_query);
            $customer_details = mysqli_fetch_assoc($customer_result);
            
        ?>

<div class="container " style="margin-top: 0px; margin-bottom: 200px; width: 70%;">

        <form action="../src/AdminPage/customer_shipping_post.php" method="POST" id="login-form">

        <p> <b><p style="text-align: center"> Enter your shipping details </b> </p>

        <div class="form-group row">
            <label for="firstName" class="col-sm-3 col-form-label signup-label">First Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="update-firstName" name="firstName"  placeholder="First Name"  
                readonly
                    
            value="<?php echo $customer_details['first_name'];?>"                            
            >                
        </div>
    </div>
    <div class="form-group row">
        <label for="lastName" class="col-sm-3 col-form-label signup-label">Last Name</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-lastName" name="lastName" 
            placeholder="Last Name" readonly
            value="<?php echo     $customer_details['last_name'];  ?>"                          
            > 
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-3 col-form-label signup-label">Email </label>
        <div class="col-sm-9">
        <input type="email" class="form-control" id="update-email" name="email"
            placeholder="Email address">
        </div>
    </div>

    <!-- TODO make country code selection -->
    <div class="form-group row">
        <label for="phone" class="col-sm-3 col-form-label signup-label">Contact</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-phone"
            name="phone" placeholder="Contact Number" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="stAddress" class="col-sm-3 col-form-label signup-label">Shipping Address</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-address" name="shipAddress"
            placeholder="Complete Shipping Address" required>
        </div>
    </div>
    <div class="text-center">
        <button class="btn yellow-theme-btn" type="submit" name="save-customer-shipping-btn"
            id="save-customer-shipping-btn">Save Details and Start Payment Process</button>                                 
    </div>
    </form>
</div>