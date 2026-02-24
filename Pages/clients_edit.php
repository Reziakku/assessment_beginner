<?php
include "../db.php";

$id = $_GET['id'];

$get = mysqli_query($conn, "SELECT * FROM clients WHERE client_id = $id");
$client = mysqli_fetch_assoc($get);

$message = "";

if (isset($_POST['update'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

if ($full_name == "" || $email == "") {
    $message = "Name and Email are required!";
    } else {
    $sql = "UPDATE clients
            SET full_name='$full_name', email='$email', phone='$phone', address='$address'
            WHERE client_id=$id";
    mysqli_query($conn, $sql);
    header("Location: clients_list.php");
    exit;
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8"><title>Edit Client</title>
    <link rel="stylesheet" href="../Styles/style.css">
    <link rel="stylesheet" href="../Styles/pages.css">
</head>
<body>
<?php include "../nav.php"; ?>

<div class="Container">
<h2>Edit Client</h2>
<p style="color:red;"><?php echo $message; ?></p>

<form method="post">
    <div>
    <label>Full Name*</label><br>
    <input type="text" name="full_name" value="<?php echo $client['full_name']; ?>"><br><br>
    </div>

    <div>
    <label>Email*</label><br>
    <input type="text" name="email" value="<?php echo $client['email']; ?>"><br><br>
    </div>

    <div>
    <label>Phone</label><br>
    <input type="text" name="phone" value="<?php echo $client['phone']; ?>"><br><br>
    </div>

    <div>
    <label>Address</label><br>
    <input type="text" name="address" value="<?php echo $client['address']; ?>"><br><br>
    </div>
    
    <button type="submit" name="update" class="update_btn">Update</button>
</form>
</div>
</body>
</html>