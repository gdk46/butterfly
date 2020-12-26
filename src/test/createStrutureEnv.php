<?php

use Util\Structure\StructureEnv;

require_once "../../env.php";

?>

<textarea name="" id="" cols="100" rows="25">
<?=StructureEnv::variablesEnv()?>
</textarea>
<textarea name="" id="" cols="100" rows="25">
<?=StructureEnv::autoload()?>
</textarea>

<textarea name="" id="" cols="100" rows="25">
<?=StructureEnv::connectDao()?>
</textarea>
