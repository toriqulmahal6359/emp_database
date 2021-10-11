<?php
include('inc/header.inc.php');

$company_query = "SELECT * FROM company ORDER BY company_name";
$res = mysqli_query($con, $company_query);
$unique = mysqli_num_rows($res);

if(isset($_GET['type']) && $_GET['type'] != ''){
    $type = mysqli_real_escape_string($con, $_GET['type']);

    if($type == 'delete'){
        $company_name = mysqli_real_escape_string($con, $_GET['company_name']);
        $company_del_query = "DELETE FROM company WHERE company_name = '$company_name'";
        mysqli_query($con, $company_del_query);
        header('Location:company_data.php');
    }
}
?>
<section class="emp_section" style="width: 100%">
    <table id="emp_data">
        <thead>
            <tr width="100px">
                <th width="15%">ID</th>
                <th width="15%">Company Name</th>
                <th width="15%">City</th>
                <th width="15%">Edit</th>
                <th width="15%">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php if($unique > 0){ ?>
            <?php $i = 1; ?>
            <?php while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){ ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['company_name']; ?></td>
                <td><?php echo $row['city']; ?></td>
                <td><a href="company_form.php?company_name=<?php echo $row['company_name']?>">Edit</a></td>
                <td><a href="?type=delete&company_name=<?php echo $row['company_name']; ?>">Delete</a></td>
            </tr>
            <?php $i++; ?>     
            <?php }
            } ?>
        </tbody>
    </table>
    <a href="company_form.php">Add New</a>
</section>
<?php
include('inc/footer.inc.php');
?>