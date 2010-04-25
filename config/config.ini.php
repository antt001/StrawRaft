;<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']);die ('<h2>Direct File Access Prohibited</h2>'); ?>

; config file for s2g

[application]
process_user_status = false
cookie_expire = 3600

;[database]
;db_type = oci
;db_name = gazit
;db_hostname = gazitidb
;db_username = applic
;db_password = applic
;db_port = 1521

[database]
db_type = mysql
db_name = applic
db_hostname = localhost
db_username = applic
db_password = applic
db_port = 3306

[logging]
log_level = 200
log_handler = file
log_file = /temp/site.log
