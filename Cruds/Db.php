<?php
     define('_HOST_NAME','localhost');
     define('_DATABASE_USER_NAME','root');
     define('_DATABASE_PASSWORD','');
     define('_DATABASE_NAME','lastopitas');

     $MySQLiconn = new MySQLi(_HOST_NAME,_DATABASE_USER_NAME,_DATABASE_PASSWORD,_DATABASE_NAME);
     $MySQLiconn->set_charset("utf8");
     if($MySQLiconn->connect_errno)
     {
       die("ERROR : -> ".$MySQLiconn->connect_error);
     }
 ?>
