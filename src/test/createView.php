<?php

use Util\Structure\StructureView;
use Dao\Connect;

require_once "../../env.php";
$conn      = new Connect();


$createView = new StructureView($conn->getConnect(), "pessoas");

?>

<textarea name="" id="" cols="100" rows="25">
<?=$createView->viewInput()?>
</textarea>

<textarea name="" id="" cols="100" rows="25">
<?=$createView->viewTable()?>
</textarea>