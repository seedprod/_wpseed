<?php
// Set $k['error_msg'] and $is_valid
//Test $input[$k['id']]
$is_valid= is_email($input[$k['id']]);
$k['error_msg'] = 'oh no email sucks';