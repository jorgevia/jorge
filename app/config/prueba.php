<?php

    $vacationPackageMock = array(
        (object) array(
            'includedComponents' => array(
                (object) array('category' => 'dine')
            )
        )
    );


    var_dump($vacationPackageMock[0]->includedComponents[0]->category);
