<title>Index View</title>
<center><h1>Texte au milieu</h1></center>
<center><?= $this->ex_text ?></center>
<br>
<br>
<br>
<?php foreach($this->userList as $key => $val) { ?>
<center><h3><?= $val['Username'] ?></h3></center>
<?php } ?>
<center>footer</center>