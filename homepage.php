<style>
td{
    padding:10px;
}

</style>

<?php
include 'config.php';

$query = "select * from samplelogindb";

$data = mysqli_query($conn, $query);

$totRec = mysqli_num_rows($data);


if($totRec)
{

    ?>
    <table border="1">
        <tr>
            <th>Username</th>
            <th>Password</th>
        </tr>
    

    <?php

    while($result = mysqli_fetch_assoc($data)){

        echo "
            <tr>
            <td>".$result['Usernamr']."</td>
            <td>".$result['Password']."</td>
            <td><a href='update.php?rn=$result[Username]&nm=$result[name]&cl=$result[class]'>Edit</td>
            <td><a href='delete.php?rn=$result[Password]' onclick = 'return DeleteRecord()'>Delete</td>
    </tr>
        
        ";

  
    // echo "There are records in The database: $totRec";
    }
}
else
{
    echo "There are no records in The database";
}

?>


</table>
<br>
<a href="http://localhost/*C/htdocs/algoo/index.php"> + Add New Record </a>

<script>
function DeleteRecord()
{
    return confirm ("Do you want to delete this Record");
}

</script>
<?php
include 'config.php';
$roll = $_GET['rn'];

$query = "delete from samplelogindb where username='$username'";

$data = mysqli_query($conn, $query);

if($data)
{
    echo "<script>alert('Record Deleted')</script>";
?>
<meta http-equiv="refresh" content="0;  url=http://localhost/*C/htdocs/algoo/homepage.php">
 
<?php
}
else
{
    echo "Delete process fail";
}



