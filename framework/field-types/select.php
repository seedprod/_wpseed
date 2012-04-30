<?php

echo "<select id='$id' class='".(empty($class) ? '' : $class)."' name='{$setting_id}[$id]'>";
foreach($option_values as $k=>$v){
	echo "<option value='$k' ".selected($options[$id],$k).">$v</option>";
}
echo "</select>";