<?php
function get_current_tag() {
    return file_get_contents('CURRENTTAG.txt');
}