<?php

use Util\Structure\StructureModel;
use Dao\Connect;

require_once "../../env.php";
$conn      = new Connect();


$createModel = new StructureModel($conn->getConnect(), "pessoas");

?>

<textarea name="" id="" cols="100" rows="25">
<?=$createModel->model()?>
</textarea>