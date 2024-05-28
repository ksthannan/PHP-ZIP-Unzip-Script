<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PHP ZIP Extractor</title>
	<link rel="icon" href="" type="image/gif" sizes="16x16">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
		*{margin:0;padding:0;text-shadow:1px 1px #fff}a{text-decoration:none}body{font-size:14px;line-height:24px}.main{display:block;max-width:960px;margin:0 auto;padding:20px}.main_wrap{padding:40px 20px}.header_area{background:rgba(0,0,0,.1)}.footer_area{font-size:12px;background:rgba(0,0,0,.1)}.warning{color:#ea4c55}.file_list{width:100%;display:block;max-height:200px;overflow-x:hidden;border:2px solid #b2b2b2;overflow-y:scroll;margin-bottom:20px}.file_list li:first-child{background:rgba(0,0,0,.1)}.file_list li{cursor:default;margin:1px;padding:0 5px;border-radius:3px}.file_list li:hover{background:rgba(0,0,0,.1)}.zip_input{min-height:200px}input[type=text]{border:1px solid #ddd;border-radius:3px;width:calc(100% - 20px);padding:10px;}input[type=submit]{border:1px solid #ddd;border-radius:3px;cursor:pointer;font-size:16px}input[type=submit]:hover{border:1px solid #999}.zip_input input[type=text]{display:block;overflow:hidden;padding:10px;margin:5px 0;width:calc(100% - 20px);}.zip_input input[type=submit]{display:block;padding:10px 20px;margin:10px 0}.author_info{margin-top:50px}
    </style>
</head>

<body>
    <div class="main header_area">
        <h2>PHP ZIP Unzip Script</h2>
		<p>Effortlessly unzip your files with this simple PHP script. Try it now for a quick and reliable file extraction solution!</p>
    </div>
    <?php if(isset($_REQUEST['confirm'])){ ?>
        <div class="main main_wrap">
            <?php
			$zip = new ZipArchive;
			$ext_tar_path = $_REQUEST['target_path'];
			$ext_tar_from_path = $_REQUEST['target_from_path'];
			if ($zip->open($ext_tar_from_path) === TRUE) {
			echo '<h3 style="color:green">Files has been extracted: </h3><div class="file_list">';
			 for($i = 0; $i < $zip->numFiles; $i++) 
			 {   
				  echo '<li>' . $zip->getNameIndex($i) . '</li>'; 
			 } 		
			 echo '</div>';
				$zip->extractTo($ext_tar_path);
				$zip->close();
				echo '<b style="color:green">File has been extracted successfully</b><br /><a href="" style="font-size:20px;">&#8592; Back to extract more items</a>';
			} else {
				echo '<b style="color:red;">Oops! Something may wrong there. </br>Failed to extract the file.</b><br /><a href="" style="font-size:20px;">Try again</a>';
			}
		?>
        </div>

        <?php } else {
			$ext_path = getcwd() . "/";
			$ext_path = str_replace("\\","/",$ext_path);
		?>

            <div class="main zip_input">
                <div class="warning">
                    <p>Important Notice:</p>
                    <li>Make sure you are going to extract a zip file.</li>
                    <li>If your given directory doesn't exist, that will be created automatically.</li>
					<li>Please input the correct information to avoid any unwanted error.</li>
                </div>
                <br />
                <form action="" method="post">
                    <label for="arc_file">Zip file - <span style="color:#ea4c55">replace <code>file_name.zip</code> with your existing zip file</span>
                        <input type="text" id="arc_file" name="target_from_path" value="<?php echo $ext_path;?>file_name.zip" />
                    </label>
                    <label for="ext_file">Extract (Extract here)
                        <input type="text" id="ext_file" name="target_path" value="<?php echo $ext_path;?>" />
                    </label>
                    <input type="hidden" name="confirm" value="1" />
                    <input type="submit" value="Extract" />
                </form>
				
				<div class="author_info">
					<p>Abdul Hannan,</p>
					<p>Professional Full Stack Web Developer,</p>
					<p>Website: <a style="color:#333;" href="http://devhannan.com">https://www.devcone.com</a></p>
				</div>
            </div>

            <?php } ?>
                <div class="main footer_area">
                    <p>Copyright &copy; <a href="https://devcone.com/">Devcone</a> 2024. All Rights Reserved.</p>
                </div>
</body>

</html>
