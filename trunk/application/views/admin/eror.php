<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>
// jika file gagal d upload maka muncul error messgae

<?php echo form_open_multipart('admin/foto/upload_file');?>
//form pembuka yg telah dilengkapi multipart form data

<input type="file" name="fupload" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>