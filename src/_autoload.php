<?php

spl_autoload_register(function($name) {
    include_once('classes/' . $name . ".php");
});