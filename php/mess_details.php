<?php
// mess details
// mess details

if (!empty($_POST['messname'])) {
    $messname = $_POST['messname'];
    if (preg_match('/^[A-z 0-9 ]/', trim($messname))) {
    } else {
        echo "Please Enter Mess Name";
        die();
    }
} else {
    echo "Enter Mess Name";
    die();
}
if (!empty($_POST['price'])) {
    $price = $_POST['price'];

    if (preg_match('/^[0-9]{3,}$/', trim($price))) {
    } else {
        echo "Mess Price greaterthen 100";
        die();
    }
    if (preg_match('/^[0-9]{3,5}$/', trim($price))) {
    } else {
        echo "Mess Price lessthen 99999";
        die();
    }
} else {
    echo "Enter Mess Price";
    die();
}
if (!empty($_POST['messlocation'])) {
    $messlocation = $_POST['messlocation'];
    if (preg_match('/^[A-z 0-9 ]/', trim($messlocation))) {
    } else {
        echo "Enter Mess Location";
        die();
    }
} else {
    echo "Enter Mess messlocation";
    die();
}
if (!empty($_POST['messcontactno'])) {
    $messcontactno = $_POST['messcontactno'];
    if (preg_match('/^[0-9]{10}$/', trim($messcontactno))) {
    } else {
        echo "Invalid Mess Contact Number";
        die();
    }
} else {
    echo "Enter Mess Contact No.";
    die();
}
if (!empty($_POST['messtype'])) {
    $messtype = $_POST['messtype'];
} else {
    echo "Enter Mess Type";
    die();
}
if (!empty($_POST['messabout'])) {
    $messabout = $_POST['messabout'];
    if (preg_match('/^[A-z 0-9 ]/', trim($messabout))) {
    } else {
        echo "Enter Mess About";
        die();
    }
} else {
    echo "Enter Mess About";
    die();
}
if (!empty($_POST['foodfacility'])) {
    $foodfacility = $_POST['foodfacility'];
} else {
    echo "Enter Food Facility";
    die();
}
if (!empty($_POST['bathroom'])) {
    $bathroom = $_POST['bathroom'];
} else {
    echo "Enter Bathroom";
    die();
}
if (!empty($_POST['ownername'])) {
    $ownername = $_POST['ownername'];
    if (preg_match('/^[A-z 0-9 ]/', trim($ownername))) {
    } else {
        echo "Enter mess OwnerName";
        die();
    }
} else {
    echo "Enter Mess OwnerName";
    die();
}
if (!empty($_POST['bedavailable'])) {
    $bedavailable = $_POST['bedavailable'];
} else {
    echo "Enter Bed Available";
    die();
}
if (!empty($_POST['electricity'])) {
    $electricity = $_POST['electricity'];
} else {
    echo "Enter Electricity";
    die();
}
if (!empty($_POST['extrafacility'])) {
    $extrafacility = $_POST['extrafacility'];
    if (preg_match('/^[A-z 0-9 ]/', trim($extrafacility))) {
    } else {
        echo "Enter extrafacility";
        die();
    }
} else {
    echo "Enter Extra Facility";
    die();
}
// INsert database

include 'config.php';

session_start();
$postdata = date('d m y');
$authorname = $_SESSION['name'];
$authorphone = $_SESSION['phone'];
$authoremail = $_SESSION['email'];
$authorpassword = $_SESSION['password'];

$insert_sql = "INSERT INTO allmess (messname,price,messlocation,messcontactno,messtype,messabout,foodfacility,ownername,bedavailable,electricity,extrafacility,bathroom,authorname,authorphone,authoremail,authorpassword,postdate) VALUES ('{$messname}','{$price}','{$messlocation}','{$messcontactno}','{$messtype}','{$messabout}','{$foodfacility}','{$ownername}','{$bedavailable}','{$electricity}','{$extrafacility}','{$bathroom}','{$authorname}','{$authorphone}','{$authoremail}','{$authorpassword}','{$postdata}')";

if (mysqli_query($conn, $insert_sql)) {
    echo "ok";
} else {
    echo "Mess Register failed";
}
