<?php

$count = 0;
foreach($option_values as $k=>$v){
    echo "<input type='checkbox' name='{$setting_id}[$id][]' value='$k'".checked($options[$id],$k)."  /> $v<br/>";
    $count++;
}