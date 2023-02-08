<?php

ob_start();

include './layout/form/curso.form.php';

$corpo = ob_get_clean();
include './layout/page/mestre2.php';
