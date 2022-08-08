<?php

    $conntct = mysqli_connect(localhost, root, '', for_test_project);
    if (!$conntct) {
        die('error connect to DB');
    }