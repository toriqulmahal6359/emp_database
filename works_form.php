<?php
include("inc/header.inc.php");

// echo "<pre>";
// print_r($_POST);
// die();

$employee_name = '';
$company_name = '';
$salary = '';

if(isset($_GET['employee_name']) && ($_GET['employee_name'] != '')){
    $name = mysqli_real_escape_string($con, $_GET['employee_name']);
    $query = "SELECT * FROM works WHERE employee_name = '$name'";
    $res = mysqli_query($con, $query);
    $unique = mysqli_num_rows($res);

    if($unique > 0){
        $rows = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $employee_name = $rows['employee_name'];
        $company_name = $rows['company_name'];
        $salary = $rows['salary'];
    }else{
        header('Location:works_form.php');
    }
}

if(isset($_POST['works_submit'])){
    $employee_name = mysqli_real_escape_string($con, $_POST['employee_name']);
    $company_name = mysqli_real_escape_string($con, $_POST['company_name']);
    $salary = mysqli_real_escape_string($con, $_POST['salary']);

    $unq_query = "SELECT * FROM works WHERE employee_name = '$employee_name'";
    $unq = mysqli_query($con, $unq_query);
    $check = mysqli_num_rows($unq);
    if($check > 0){
        if(isset($_GET['employee_name']) && ($_GET['employee_name'] != '')){
            $works_update_query = "UPDATE works SET employee_name='$employee_name', company_name='$company_name', salary='$salary' WHERE employee_name='$name'";
            mysqli_query($con, $works_update_query);
        }
        header('Location:works_data.php');
        die();
    }else{
        $works_insert_query = "INSERT INTO works(employee_name, company_name, salary) VALUES('$employee_name', '$company_name', '$salary')";
        mysqli_query($con, $works_insert_query);
            header('Location:works_data.php');
            die();
    }
}
?>
    <section style="width: 50%">
        <span class="emp_status">Works Form</span>
        <form method="post" class="emp_form">
            <input type="hidden" name="employee_name" value="<?php echo $employee_name?>"/>
            <table>
                <tr>
                    <td>Employee Name :</td>
                    <td><input type="text" name="employee_name" id="employee_name" value="<?php echo $employee_name?>"/></td>
                </tr>
                <tr>
                    <td>Company Name :</td>
                    <td><input type="text" name="company_name" id="company_name" value="<?php echo $company_name?>"/></td>
                </tr>
                <tr>
                    <td>Salary :</td>
                    <td><input type="number" name="salary" id="salary" min="0" value="<?php echo $salary?>"/></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td><input type="submit" name="works_submit" value="Submit" id="emp_btn"/></td>
                </tr>
            </table>
        </form>
</section>

<?php
include('inc/footer.inc.php');
?>
