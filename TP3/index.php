<?php
if (isset($_GET['css'])) {
    $selectedStyle = $_GET['css'];
    setcookie('selected_style', $selectedStyle, time() + 3600, '/');
}

?>


<form id="style_form" action="index.php" method="GET">
<select name="css">
<option value="style1">style1</option>
<option value="style2">style2</option>
</select>
<input type="submit" value="Appliquer" />
</form>



<?php
        if (isset($_GET['css'])) {
            $selectedStyle = $_GET['css'];
            echo "<link rel='stylesheet' type='text/css' href='{$selectedStyle}.css'>";
    }

?>

<?php
print_r($_GET);
?>

