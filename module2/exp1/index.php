<!DOCTYPE html>
<html>
<head>
    <title>Image Upload and Display</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }
        .container {
            width: 400px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        h2 {
            margin-bottom: 10px;
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="file"] {
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        input[type="submit"] {
            padding: 8px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        h3 {
            margin-top: 20px;
            color: #333;
        }
        .image-link {
            display: block;
            margin-bottom: 10px;
            color: blue;
            text-decoration: none;
        }
        img {
            max-width: 500px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Image</h2>
        <?php
        $targetDirectory = "uploads/";
        
        if(isset($_POST["submit"])) {
            if (!file_exists($targetDirectory)) {
                mkdir($targetDirectory, 0777, true); 
            }

            $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            
            if (!empty($_FILES["fileToUpload"]["tmp_name"]) && $check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "Please select a valid image file.";
                $uploadOk = 0;
            }

            $allowedFormats = array("jpg", "png", "jpeg", "gif");
            if (!in_array($imageFileType, $allowedFormats)) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>

        <h2>View Image</h2>
        <?php
        if(isset($_GET['image'])) {
            $image = $_GET['image'];
            $imagePath = $targetDirectory . $image;
            if (file_exists($imagePath)) {
                echo "<script>window.open('uploads/$image', '_blank');</script>";
            } else {
                echo "Image not found.";
            }
        }
        ?>

        <h3>Uploaded Images:</h3>
        <?php
        if (file_exists($targetDirectory)) {
            $images = scandir($targetDirectory);
            foreach($images as $image) {
                if($image != '.' && $image != '..') {
                    echo "<a href='?image=$image'>$image</a><br>";
                }
            }
        } else {
            echo "No images uploaded yet.";
        }
        ?>
    </div>
</body>
</html>
