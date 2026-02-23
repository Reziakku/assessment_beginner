<?php
include "../db.php";

$message = "";

if (isset($_POST['save'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

if ($full_name == "" || $email == "") {
    $message = "Name and Email are required!";
    } else {
    $sql = "INSERT INTO clients (full_name, email, phone, address)
            VALUES ('$full_name', '$email', '$phone', '$address')";
    mysqli_query($conn, $sql);
    header("Location: clients_list.php");
    exit;
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8"><title>Add Client</title>
    <link rel="stylesheet" href="../Styles/style.css">
    <link rel="stylesheet" href="../Styles/pages.css">
</head>
<body>
<?php include "../nav.php"; ?>

<div class="Container">
<h2>Add Client</h2>
<p style="color:red;"><?php echo $message; ?></p>

<form method="post">
    <div>
    <label>Full Name*</label><br>
    <input type="text" name="full_name" placeholder="Full Name"><br><br>
    </div>

    <div>
    <label>Email*</label><br>
    <input type="text" name="email" placeholder="Email"><br><br>
    </div>

    <div>
    <label>Phone Number</label><br>
    <input type="text" name="phone" placeholder="Phone Number"><br><br>
    </div>

    <div>
    <label>Address</label><br>
    <input type="text" name="address" placeholder="Address"><br><br>
    </div>
    
    <button type="submit" name="save">Save</button>
</form>
</div>
</body>
</html>