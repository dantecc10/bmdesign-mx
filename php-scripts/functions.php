<?php

function prepare_msg($msg) {
    str_ireplace("
    ", "</p><p>", $msg);
    return ("<p>". $msg."</p>");
}