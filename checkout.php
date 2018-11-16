<?php
    require_once("includes/header.php");
    $sql = $conn->query("select * from products");
    if(isset($_SESSION['u_id'])){
        header("Location: login.php");
    }
?>
    <main>
        <script>
            $.ajax({
                url: "token.php",
                type: "get",
                dataType: "json",
                success: function (data) {
                        braintree.setup(data,'dropin', { container: 'dropin-container'});
                        console.log("the button dropin got set up sucessfully");
                }
            })
        </script>

        <form action="payment.php" method="post" class="payment-form">
            <label for="firstName" class="heading">First Name</label><br>
            <input type="text" name="firstName" id="firstName"><br><br>

            <label for="lastName" class="heading">Last Name</label><br>
            <input type="text" name="lastName" id="lastName"><br><br>

            <label for="amount" class="heading">Amount (GBP)</label><br>
            <input type="text" name="amount" id="amount"><br><br>

            <div id="dropin-container"></div>
            <br><br>
            <button type="submit">Pay with BrainTree</button>

        </form>
    </main>
<?php
    require_once("includes/footer.php");
?>