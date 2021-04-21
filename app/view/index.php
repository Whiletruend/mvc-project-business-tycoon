<title>Index View</title>
<center><h1>Texte au milieu</h1></center>
<center><?= $this->ex_text ?></center>
<br>
<br>
<br>
<?php foreach($this->userList as $key => $val) { ?>
<center><h3><?= $val['Username'] . ' : ' . $val['Password'] ?></h3></center>
<?php } ?>
<br>
<center><h5><?php if(isset($_POST['mail_USER'])) { var_dump($_POST['mail_USER']); } else { echo 'Not connected'; } ?></h5></center>
<center>footer</center>