$req=$conn->prepare('SELECT LAST_INSERT_ID()');
$req->execute();
$ligne=$req->fetch();
//le numéro sera dans $ligne['LAST_INSERT_ID()']