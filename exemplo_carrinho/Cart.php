<?php

class Cart
{
  public function __construct()
  {
    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = [
        'products' => [],
        'total' => 0
      ];
    }
  }


  public function add(Product $product)
  {
    $inCart = false;
    $this->setTotal($product);
    if (count($this->getCart()) > 0) {
      foreach ($this->getCart() as $productInCart) {
        if ($productInCart->getId() === $product->getId()) {
          $quantity = $productInCart->getQuantity() + $product->getQuantity();
          $productInCart->setQuantity($quantity);
          $inCart = true;
          break;
        }
      }
    }

    if (!$inCart) {
      $this->setProductsInCart($product);
    }
  }

  private function setProductsInCart($product)
  {
    $_SESSION['cart']['products'][]  = $product;
  }

  private function setTotal(Product $product)
  {
    $_SESSION['cart']['total'] += $product->getPrice() * $product->getQuantity();
  }

  public function remove(int $id)
  {
    foreach ($this->getCart() as $index => $product) {
      if ($product->getId() === $id) {
        $product->setQuantity($product->getQuantity() - 1);

        if ($product->getQuantity() <= 0) {
          unset($_SESSION['cart']['products'][$index]);
        }

        $_SESSION['cart']['total'] -= $product->getPrice();
        // unset($_SESSION['cart']['products'][$index]);
        // $_SESSION['cart']['total'] -= $product->getPrice() * $product->getQuantity();
      }
    }
  }

  private function setTotalIfChangeQty($product, $qty)
  {
    if ((int)$qty > $product->getQuantity()) {
      $_SESSION['cart']['total'] += $product->getPrice() * ((int)$qty - $product->getQuantity());
    } else {
      // 2000 = 1000 * (2-1) = 2000+2000 = 4000
      $_SESSION['cart']['total'] -= $product->getPrice() * ($product->getQuantity() - (int)$qty);
    }
  }

  public function updateQty($id, $qty)
  {
    foreach ($this->getCart() as $index => $product) {
      if ($product->getId() === (int)$id) {
        if ($product->getQuantity() === (int)$qty) {
          return;
        }

        $this->setTotalIfChangeQty($product, $qty);

        $product->setQuantity((int)$qty);

        if ($product->getQuantity() <= 0) {
          unset($_SESSION['cart']['products'][$index]);
        }
      }
    }
  }

  public function getCart()
  {
    return $_SESSION['cart']['products'] ?? [];
  }

  public function getTotal()
  {
    return $_SESSION['cart']['total'] ?? 0;
  }
}