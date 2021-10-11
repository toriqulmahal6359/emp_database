<?php
include("inc/header.inc.php");

// echo "<pre>";
// print_r($_POST);
// die();

$employee_name = '';
$manager_name = '';

if(isset($_GET['employee_name']) && ($_GET['employee_name'] != '')){
    $name = mysqli_real_escape_string($con, $_GET['employee_name']);
    $query = "SELECT * FROM manages WHERE employee_name = '$name'";
    $res = mysqli_query($con, $query);
    $unique = mysqli_num_rows($res);

    if($unique > 0){
        $rows = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $employee_name = $rows['employee_name'];
        $manager_name = $rows['manager_name'];
    }else{
        header('Location:manages_form.php');
    }
}

if(isset($_POST['manages_submit'])){
    $employee_name = mysqli_real_escape_string($con, $_POST['employee_name']);
    $manager_name = mysqli_real_escape_string($con, $_POST['manager_name']);

    $unq_query = "SELECT * FROM manages WHERE employee_name = '$employee_name'";
    $unq = mysqli_query($con, $unq_query);
    $check = mysqli_num_rows($unq);
    if($check > 0){
        if(isset($_GET['employee_name']) && ($_GET['employee_name'] != '')){
            $manages_update_query = "UPDATE manages SET employee_name='$employee_name', manager_name='$manager_name' WHERE employee_name='$name'";
            mysqli_query($con, $manages_update_query);
        }
        header('Location:manages_data.php');
        die();
    }else{
        $manages_insert_query = "INSERT INTO manages(employee_name, manager_name) VALUES('$employee_name', '$manager_name')";
        mysqli_query($con, $manages_insert_query);
            header('Location:manages_data.php');
            die();
    }
}
?>
    <section style="width: 50%">
        <span class="emp_status">Manages Form</span>
        <form method="post" class="emp_form">
            <input type="hidden" name="employee_name" value="<?php echo $employee_name?>"/>
            <table>
                <tr>
                    <td>Employee Name :</td>
                    <td><input type="text" name="employee_name" id="employee_name" value="<?php echo $employee_name?>"/></td>
                </tr>
                <tr>
                    <td>Manager Name :</td>
                    <td><input type="text" name="manager_name" id="manager_name" value="<?php echo $manager_name?>"/></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td><input type="submit" name="manages_submit" value="Submit" id="emp_btn"/></td>
                </tr>
            </table>
        </form>
</section>

<?php
include('inc/footer.inc.php');
?>
