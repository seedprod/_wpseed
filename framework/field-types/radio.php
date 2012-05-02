<?php

foreach($option_values as $k=>$v){
    echo "<input type='radio' name='{$setting_id}[$id]' value='$k' ".checked($options[$id],$k, false)."  /> $v<br/>";
}