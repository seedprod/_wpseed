<?php

echo "<textarea id='$id' class='".(empty($class) ? '' : $class)."' name='{$setting_id}[$id]'>".$options[$id]."</textarea>";