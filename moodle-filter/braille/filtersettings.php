<?php

$settings->add(new admin_setting_configtext('filter_braille_remote_url',
  get_string('remote_braille_url', 'filter_braille'),
  get_string('remote_braille_url_desc', 'filter_braille'), 'remote_url', PARAM_NOTAGS));

?>