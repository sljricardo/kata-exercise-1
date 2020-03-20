<?php

// All routes will be controle by VUE
$router->get('/{any:.*}', function () {
    return view('app');
});

