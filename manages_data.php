<?php
include('inc/header.inc.php');

$manages_query = "SELECT * FROM manages ORDER BY employee_name";
$res = mysqli_query($con, $manages_query);
$unique = mysqli_num_rows($res);

if(isset($_GET['type']) && $_GET['type'] != ''){
    $type = mysqli_real_escape_string($con, $_GET['type']);

    if($type == 'delete'){
        $employee_name = mysqli_real_escape_string($con, $_GET['employee_name']);
        $manages_del_query = "DELETE FROM manages WHERE employee_name = '$employee_name'";
        mysqli_query($con, $manages_del_query);
        header('Location:manages_data.php');
    }
}
?>
<section class="emp_section" style="width: 75%">
    <table id="emp_data">
        <thead>
            <tr width="100px">
                <th width="15%">ID</th>
                <th width="15%">Employee Name</th>
                <th width="15%">Manager Name</th>
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
                <td><?php echo $row['employee_name']; ?></td>
                <td><?php echo $row['manager_name']; ?></td>
                <td><a href="manages_form.php?employee_name=<?php echo $row['employee_name']?>">Edit</a></td>
                <td><a href="?type=delete&employee_name=<?php echo $row['employee_name']; ?>">Delete</a></td>
            </tr>
            <?php $i++; ?>     
            <?php }
            } ?>
        </tbody>
    </table>
    <a href="manages_form.php">Add New</a>
</section>
<?php
include('inc/footer.inc.php');
?>