memory_limit=128M
post_max_size=30M
max_file_size=30M
upload_max_filesize=30M
display_errors=0
<?php
  if(!$_ENV['IS_HEROKU']) {
    echo "opcache.enable=0";
  }
?>