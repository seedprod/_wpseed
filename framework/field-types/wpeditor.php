<?php

$content = $options[$id];
$editor_id = $id;
$args = array('textarea_name'=>"{$setting_id}[$id]"); // Optional arguments.
wp_editor( $content, $editor_id, $args );