<?php

define('TEMPLATES_URL', __DIR__ . '/templates');

function include_template(string $name){
    include TEMPLATES_URL . "/${name}.php";
}