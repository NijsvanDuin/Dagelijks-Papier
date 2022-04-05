<?php
include("./connect_db.php");

$per_page = 4;


$sql = "SELECT * FROM `register`";

$result = mysqli_query($conn, $sql);

$count = mysqli_num_rows($result);

$pages = ceil($count / $per_page);

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}

$start = ($page - 1) * $per_page;

$sql = "SELECT * FROM `register` limit $start, $per_page";

$result = mysqli_query($conn, $sql);

$row = "";
while ($record = mysqli_fetch_assoc($result)) {
    $row .= "<tr>
                    <td>{$record['id']}</td>
                    <td>{$record['email']}</td>
                    <td>{$record['userrole']}</td>
                    <td>{$record['activated']}</td>
                    " . //<td><a href='./update.php?id={$record['id']}'><i class='bi bi-pencil-fill'></i></a></td>
                    "<td><a class='delete-text' href='./index.php?content=delete&id={$record['id']}'>Delete</a></td>
        
                 </tr>";
}
?>
<link rel="stylesheet" href="./css/style.css">
<table>
<thead>
    <tr>
        <th>Id</th>
        <th>Email</th>
        <th>Userrole</th>
        <th>Active</th>
        <th>&nbsp;</th>
    </tr>
</thead>
<tbody>
    <?php echo $row; ?>
</tbody>
</table>