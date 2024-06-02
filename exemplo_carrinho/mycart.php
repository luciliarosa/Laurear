<?php

require 'Product.php';
require 'Cart.php';

session_start();

$cart = new Cart;
$productsInCart = $cart->getCart();

var_dump($productsInCart);

if (isset($_GET['remove'])) {
  $id = strip_tags($_GET['remove']);
  $cart->remove($id);
  header('Location: mycart.php');
}

if (isset($_GET['update'])) {
  $id = strip_tags($_GET['update']);
  $qty = strip_tags($_GET['qty']);
  $cart->updateQty($id, $qty);
  header('Location: mycart.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <a href="/">Go to home</a>

  <ul>
    <?php if (count($productsInCart) <= 0) : ?>
      Nenhum produto no carrinho
    <?php endif; ?>

    <?php foreach ($productsInCart as $product) : ?>
      <li>
        <?php echo $product->getName(); ?>
        <form action="">
          <input type="hidden" name="update" value="<?php echo $product->getId(); ?>">
          <input type="text" name="qty" value="<?php echo $product->getQuantity() ?>">
        </form>
        Price: R$ <?php echo number_format($product->getPrice(), 2, ',', '.') ?>
        Subtotal: R$ <?php echo number_format($product->getPrice() * $product->getQuantity(), 2, ',', '.') ?>
        <a href="?remove=<?php echo $product->getId(); ?>">remove</a>
      </li>
    <?php endforeach; ?>
    <li>Total: R$ <?php echo number_format($cart->getTotal(), 2, ',', '.'); ?></li>
  </ul>

</body>

</html>