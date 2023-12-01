<?php
// if (isset($_GET["msg"])) {
//   $msg = $_GET["msg"];
//   echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
//     ' . $msg . '
//     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//   </div>';
// }
?>

<table class="table table-hover text-center">
  <thead class="table-dark">
    <tr>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Access</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM `crud`";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <tr>
        <td><?php echo $row["username"] ?></td>
        <td><?php echo $row["password"] ?></td>
        <td><?php echo $row["access"] ?></td>
        <td>
          <a href="user-edit.php?id=<?php echo $row["username"] ?>" class="link-dark">
            <svg width="16" height="16" fill="currentColor">
              <image xlink:href="bootstrap-5.2.3/pen-fill.svg" width="16" height="16" />
            </svg>
          </a>
          &ensp;&ensp;
          <a href="user-delete.php?id=<?php echo $row["username"] ?>" class="link-dark">
            <svg width="16" height="16" fill="currentColor">
              <image xlink:href="bootstrap-5.2.3/trash3-fill.svg" width="16" height="16" />
            </svg>
          </a>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>