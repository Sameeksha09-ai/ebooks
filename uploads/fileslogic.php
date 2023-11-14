<?php
$conn = mysqli_connect("localhost","root","","ebooks");
$sql = "SELECT* FROM myfile";
$result = mysqli_query($conn,$sql);
$files = mysqli_fetch_all($result,MYSQLI_ASSOC);

if (isset($_POST['upload']) && isset($_FILES['myfile'])) {
    $filename = $_FILES['myfile']['name']; // Line 14
    $destination = 'newFile/' . $filename;
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $file = $_FILES['myfile']['tmp_name']; // Line 20
    $size = $_FILES['myfile']['size']; // Line 22

    if(!in_array($extension,['zip','pdf','png']))
    {
        echo "Your file extension must be .zip, .pdf or .png";
    }
    elseif($_FILES['myfile']['size']>1000000)
    {
        echo "file is too large";
    }
    else{
        if(move_uploaded_file($file,$destination))
        {
            $sql="INSERT INTO myfile (name,size,downloads) VALUES('$filename','$size','0')";
            if(mysqli_query($conn,$sql))
            {
                echo "File uploaded successfully";
                header("location: newindex.php");
            }
            else{
                echo"failed to upload file";
            }
        }
    }
}

if(isset($_GET['file_id']))
{
    $id = $_GET['file_id'];
    $sql="SELECT * FROM myfile WHERE id=$id";
    $result = mysqli_query($conn,$sql);
    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

    if(file_exists($filepath))
    {
        header('Content-type: application/octet-stream');
        header('Content-Description:File Transfer');
        header('Content-Disposition:attachment;filename='.
        basename($filepath));
        header('Expires:0');
        header('Cache-Control:must-revalidate');
        header('Pragma:public');
        header('Content-Length:'. filesize('uploads/'.$file['name']));
        readfile('uploads/' .$file['name']);
        $newCount = $file['downloads']+1;
        $updatQuerY = "UPDATE myfile SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn,$updatQuerY);
        exit;
    }
}
?>