<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Welcome to ZIP Archive</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }
        
        a {
            text-decoration: none;
        }
        
        .main {
            max-width: 960px;
            min-width: 320px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .main_wrap {
            padding: 40px 20px;
        }
        
        .header_area {
            width: 100%;
            background: rgba(0, 0, 0, 0.3);
        }
        
        .footer_area {
            width: 100%;
            font-size: 12px;
            background: rgba(0, 0, 0, 0.3);
        }
        
        .warning {
            color: #EA4C55;
        }
        
        .file_list {
            width: 90%;
            display: block;
            max-height: 200px;
            overflow-x: hidden;
            border: 2px solid #B2B2B2;
            overflow-y: scroll;
            margin-bottom: 20px;
        }
        
        .file_list li:first-child {
            background: #DADADA;
        }
        
        .file_list li {
            cursor: pointer;
            margin: 1px;
            padding: 0 5px;
            border-radius: 3px;
        }
        
        .file_list li:hover {
            background: #DADADA;
        }
        
        .zip_input {
            min-height: 200px;
        }
        
        input[type="text"] {
            border: 1px solid #ddd;
            border-radius: 3px;
            min-width: 280px;
        }
        
        input[type="submit"] {
            border: 1px solid #ddd;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }
        
        input[type="submit"]:hover {
            border: 1px solid #999;
        }
        
        .zip_input input[type="text"] {
            display: block;
            overflow: hidden;
            padding: 10px;
            margin: 5px 0;
        }
        
        .zip_input input[type="submit"] {
            display: block;
            padding: 10px 20px;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="main header_area">
        <h2>Welcome to ZIP Extractor</h2>
    </div>
    <?php if(isset($_REQUEST['confirm'])){ ?>
        <div class="main main_wrap">
            <?php
			$zip = new ZipArchive;
			$ext_tar_path = $_REQUEST['target_path'];
			$ext_tar_from_path = $_REQUEST['target_from_path'];

			if ($zip->open($ext_tar_from_path) === TRUE) {

			echo '<h2 style="color:green">File lists: </h2><div class="file_list">';
			 for($i = 0; $i < $zip->numFiles; $i++) 
			 {   
				  echo '<li>' . $zip->getNameIndex($i) . '</li>'; 
			 } 		
			 echo '</div>';

				$zip->extractTo($ext_tar_path);
				$zip->close();
				echo '<b style="color:green">File has been extracted successfully</b><br /><a href="" style="font-size:20px;">&#8592; Back</a>';

			} else {
				echo '<b style="color:red;">Oops! </br>Failed to extract the file.</b><br /><a href="" style="font-size:20px;">Try again</a>';
			}
		?>
        </div>

        <?php } else {
			$ext_path = getcwd() . "/";
			$ext_path = str_replace("\\","/",$ext_path);
		?>

            <div class="main zip_input">
                <div class="warning">
                    <p>Notice:</p>
                    <li>Make sure you are going to extract from zip archived file.</li>
                    <li>Please input the correct information to avoid any unwanted error.</li>
                    <li>If your given directory doesn't exist, that will be created automatically.</li>
                </div>
                <br />
                <form action="" method="post">
                    <label for="">Archived file (./path/example.zip):
                        <input type="text" name="target_from_path" value="<?php echo $ext_path;?>example.zip" />
                    </label>
                    <label for="">Extract to (extract here):
                        <input type="text" name="target_path" value="<?php echo $ext_path;?>" />
                    </label>
                    <input type="hidden" name="confirm" value="1" />
                    <input type="submit" value="Extract" />
                </form>
            </div>

            <?php } ?>
                <div class="main footer_area">
                    <p>Copyright &copy; <a href="https://www.facebook.com/ksthannan/">Abdul Hannan</a> 2017. All Rights Reserved.</p>
                </div>
</body>

</html>
