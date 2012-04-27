<?php

echo "<input id='$id' class='".(empty($class) ? 'regular-text' : $class)."' name='{$setting_id}[$id]' type='text' value='".esc_attr(empty($options[$id]) ? $default_value : $options[$id])."' />";