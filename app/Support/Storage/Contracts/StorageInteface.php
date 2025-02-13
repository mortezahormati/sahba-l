<?php
namespace App\Support\Storage\Contracts;

interface StorageInteface
{
    public function get($index);
    public function set($index , $value);
    public function all();
    public function exists($index);
    public function unset($index);
    public function clear();
}
