<?php

function dbfun($dbname)
{
    return (new $dbname);
}
function slug($string, $split = '-')
{
    $slug = strtolower(trim(preg_replace('/[\s-]+/', $split, preg_replace('/[^A-Za-z0-9-]+/', $split, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $string))))), $split));
    return $slug;
}
