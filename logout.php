<?php
session_name('bolsa');
session_start();
session_destroy();

header('Location: login.php');


