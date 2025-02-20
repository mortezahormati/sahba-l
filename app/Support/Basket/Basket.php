<?php

namespace App\Support\Basket;

use App\Exceptions\QuantityExceededException;
use App\Models\Product;
use App\Support\Storage\Contracts\StorageInteface;
use function PHPUnit\Framework\throwException;

class Basket {

    private $storage;

    public function __construct(StorageInteface $storage)
    {
        $this->storage = $storage ;
    }

    public function add(Product $product , int $quantity)
    {
        if($this->has($product)){
            $quantity = $this->get($product)['quantity']+ $quantity ;
        }
        $this->update($product , $quantity);
    }

    public function update(Product $product , int $quantity)
    {
        if(!$product->hasStock($quantity)){
            throw new QuantityExceededException();
        }
        if(!$quantity){
            $this->storage->unset($product->id);
        }
        $this->storage->set($product->id,[
            'quantity' => $quantity
        ]);
    }

    public function has(Product $product)
    {
        return $this->storage->exists($product->id);
    }

    public function get(Product $product)
    {
        return $this->storage->get($product->id);
    }

    public function all()
    {
        $products = Product::find(array_keys($this->storage->all()));
        foreach ($products as $p){
            $p->quantity = $this->get($p)['quantity'];
        }
        return $products;
    }

    public function subTotal()
    {
        $total = 0 ;
        foreach ($this->all() as $item) {
            $total += $item->price * $item->quantity;
        }

        return $total;
    }

    public function unset(Product $product)
    {
       return  $this->storage->unset($product->id);
    }

    public function itemCount()
    {
        return $this->storage->count();
    }

}
