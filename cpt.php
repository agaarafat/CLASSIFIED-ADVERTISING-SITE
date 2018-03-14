<?php

session_start();


if (isset($_GET["sub"])) {
    $str = $_SESSION['myCapt'];
    echo $str;
    if ($_GET["capt"] == $str) {
        echo "successfull";
        //header("location: testfile.php");
    }
    else {
        echo "wrong";
    }
}

$_SESSION = array();



include("captcha.php");

$_SESSION['captcha'] = simple_php_captcha();



?>

<!DOCTYPE html>

<html>

<head>

    <title>Example &raquo; A simple PHP CAPTCHA script</title>

    <style type="text/css">

        pre {

            border: solid 1px #bbb;

            padding: 10px;

            margin: 2em;

        }



        img {

            border: solid 1px #ccc;

            margin: 0 2em;

        }

    </style>

</head>

<body>

    <h1>

        CAPTCHA Example

    </h1>

<form action="" method="get">
        <?php

        echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';
        $str = $_SESSION['captcha']['code'];
        $_SESSION['myCapt'] = $str;
        echo $_SESSION['myCapt'];
        ?>
		Captcha : <input type="text" name="capt" />
		<input type="submit" name="sub" value="Submit"/>
</form>


</body>

</html>
