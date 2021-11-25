
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah Customer</title>
</head>
<body>
<form method="post" action="simpan.php" >
		<div class="input-group">
			<label>IC No.</label>
			<input type="text" name="nric" value="">
		</div>
        <div class="input-group">
			<label>Password</label>
			<input type="text" name="password" value="">
		</div>
        <div class="input-group">
			<label>Nama Customer</label>
			<input type="text" name="nama" value="">
		</div>
		<div class="input-group">
			<button class="btn" type="submit" name="save" >Simpan</button>
		</div>
	</form>
</body>
</html>