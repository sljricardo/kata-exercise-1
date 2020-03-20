<?php

// All routes will be controle by SPA
$router->get('/{any:.*}', function () {
    return view('app');
});

