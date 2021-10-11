<?php
include("inc/header.inc.php");

// echo "<pre>";
// print_r($_POST);
// die();

$employee_name = '';
$street = '';
$city = '';

if(isset($_GET['employee_name']) && ($_GET['employee_name'] != '')){
    $name = mysqli_real_escape_string($con, $_GET['employee_name']);
    $query = "SELECT * FROM employee WHERE employee_name = '$name'";
    $res = mysqli_query($con, $query);
    $unique = mysqli_num_rows($res);

    if($unique > 0){
        $rows = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $employee_name = $rows['employee_name'];
        $street = $rows['street'];
        $city = $rows['city'];
    }else{
        header('Location:employee_form.php');
    }
}

if(isset($_POST['employee_submit'])){
    $employee_name = mysqli_real_escape_string($con, $_POST['employee_name']);
    $street = mysqli_real_escape_string($con, $_POST['street']);
    $city = mysqli_real_escape_string($con, $_POST['city']);

    $unq_query = "SELECT * FROM employee WHERE employee_name = '$employee_name'";
    $unq = mysqli_query($con, $unq_query);
    $check = mysqli_num_rows($unq);
    if($check > 0){
        if(isset($_GET['employee_name']) && ($_GET['employee_name'] != '')){
            $employee_update_query = "UPDATE employee SET employee_name='$employee_name', street='$street', city='$city' WHERE employee_name='$name'";
            mysqli_query($con, $employee_update_query);
        }
        header('Location:employee_data.php');
        die();
    }else{
        $employee_insert_query = "INSERT INTO employee(employee_name, street, city) VALUES('$employee_name', '$street', '$city')";
        mysqli_query($con, $employee_insert_query);
            header('Location:employee_data.php');
            die();
    }
}
?>
    <section style="width: 50%">
        <span class="emp_status">Employee Form</span>
        <form method="post" class="emp_form">
            <input type="hidden" name="employee_name" value="<?php echo $employee_name?>"/>
            <table>
                <tr>
                    <td>Employee Name :</td>
                    <td><input type="text" name="employee_name" id="employee_name" value="<?php echo $employee_name?>"/></td>
                </tr>
                <tr>
                    <td>Street :</td>
                    <td><input type="text" name="street" id="street" value="<?php echo $street?>"/></td>
                </tr>
                <tr>
                    <td>City :</td>
                    <td><input type="text" name="city" id="city" value="<?php echo $city?>"/></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td><input type="submit" name="employee_submit" value="Submit" id="emp_btn"/></td>
                </tr>
            </table>
        </form>
</section>

<?php
include('inc/footer.inc.php');
?>
