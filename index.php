<?php
$background = 'background.jpg';
$mark = 'mark.jpg'

?>

<!DOCTYPE html>
<html>
<head>
<title>File Upload</title>
<link rel="stylesheet" href="styles.css">
<style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('<?php echo $background; ?>');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<header>
    <div class="mark">
        <img src="./mark.png" alt="mark">
    </div>

    <nav class="navigation">
        <a href="#">Home</a>
        <a href="#">Create project</a>
        <a href="#">Create team</a>
        <a href="#">Projects</a>

        <button class=btnlogout>log out</button>
    </nav>
</header>
<body>
    
<div class="center">
  <div class="container">
    <h2>Uploaded Files</h2>
    <table>
      <tr>
        <th>File Name</th>
        <th>Upload Time</th>
        <th>Size (KB)</th>
        <th>Actions</th>
      </tr>
      <?php
      include_once 'database.php';
      $sql = "SELECT * FROM file";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <td><?php echo $row['file_name']; ?></td>
          <td><?php echo $row['uploaded_time']; ?></td>
          <td><?php echo $row['size']; ?></td>
          <td>
            <a class="button" href="download.php?file_id=<?php echo $row['id']; ?>">Download</a>
            <a class="button" href="delete.php?file_id=<?php echo $row['id']; ?>">Delete</a>
          </td>
        </tr>
      <?php
      }
      ?>
    </table>
  </div>

  <div class="container">
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <input type="file" name="file" />
      <button type="submit" name="upload" class="ub">Upload</button>
    </form>
  </div>
</div>

</body>
</html>