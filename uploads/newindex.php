<?php
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: newlogin.php');
  }
?>
<?php include 'fileslogic.php'?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP file Upload and download application</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <h2>Welcome to the new index page, <?php echo $_SESSION['username']; ?>!</h2>
        <p><a href="newlogin.php?logout='1'" style="color: red;">Logout</a></p>
        <div class="container">
            <div class="row">
                <form action="fileslogic.php" method="post" enctype="multipart/form-data">
                    <h3>Upload Files</h3>
                    <input type="file" name="myfile"><br>
                    <input type="submit" name="upload" value="Upload"> 
                </form>
            </div>

            <div class="row">

                <table>
                    <thead>
                        <th>ID</th>
                        <th>FileName</th>
                        <th>Size(in mb)</th>
                        <th>Downloads</th>
                        <th>Action</th>
                    </thead>
                    <tbody>

                      <?php foreach($files as $file): ?>

                      <tr>
                          <td><?php echo $file['id'];?></td>
                          <td><?php echo $file['name'];?></td>
                          <td><?php echo $file['size'] / 1000 . "KB";?></td>
                          <td><?php echo $file['downloads'];?></td>
                          <td>
                            <a href="newindex.php?file_id=<?php echo $file['id']?>">Download</a>
                          </td>
                      </tr>

                      <?php endforeach ; ?>
                </table>
        </div>
    </body>
</html>
