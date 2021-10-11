<?php
include("inc/header.inc.php");

// echo "<pre>";
// print_r($_POST);
// die();

$company_name = '';
$city = '';

if(isset($_GET['company_name']) && ($_GET['company_name'] != '')){
    $name = mysqli_real_escape_string($con, $_GET['company_name']);
    $query = "SELECT * FROM company WHERE company_name = '$name'";
    $res = mysqli_query($con, $query);
    $unique = mysqli_num_rows($res);

    if($unique > 0){
        $rows = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $company_name = $rows['company_name'];
        $city = $rows['city'];
    }else{
        header('Location:company_form.php');
    }
}

if(isset($_POST['company_submit'])){
    $company_name = mysqli_real_escape_string($con, $_POST['company_name']);
    $city = mysqli_real_escape_string($con, $_POST['city']);

    $unq_query = "SELECT * FROM company WHERE company_name = '$company_name'";
    $unq = mysqli_query($con, $unq_query);
    $check = mysqli_num_rows($unq);
    if($check > 0){
        if(isset($_GET['company_name']) && ($_GET['company_name'] != '')){
            $company_update_query = "UPDATE company SET company_name='$company_name', city='$city' WHERE company_name='$name'";
            mysqli_query($con, $company_update_query);
        }
        header('Location:company_data.php');
        die();
    }else{
        $company_insert_query = "INSERT INTO company(company_name, city) VALUES('$company_name', '$city')";
        mysqli_query($con, $company_insert_query);
            header('Location:company_data.php');
            die();
    }
}
?>
    <section style="width: 50%">
        <span class="emp_status">Company Form</span>
        <form method="post" class="emp_form">
            <input type="hidden" name="company_name" value="<?php echo $company_name?>"/>
            <table>
                <tr>
                    <td>Company Name :</td>
                    <td><input type="text" name="company_name" id="company_name" value="<?php echo $company_name?>"/></td>
                </tr>
                <tr>
                    <td>City :</td>
                    <td><input type="text" name="city" id="city" value="<?php echo $city?>"/></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td><input type="submit" name="company_submit" value="Submit" id="emp_btn"/></td>
                </tr>
            </table>
        </form>
</section>

<?php
include('inc/footer.inc.php');
?>
