<?php
class ProductsController
{

	public function index()
	{
		// we store all the products in a variable
		$Products = Product::all();
		require_once('views/products/index.php');
	}

	public function show()
	{
		// we expect a url of form ?controller=products&action=show&id=x
		// without an id we just redirect to the error page as we need the post id to find it in the database
		if (!isset($_GET['cart-bttn']))
			return call('pages', 'error');

		// we use the given id to get the right product
		//$Products = $cartItems;
		$Products = Product::all();
		$found = null;
		foreach($Products as $item){
			if($item->id == $_GET['cart-bttn']){
				$found = $item;
			}
		}
		require_once('views/products/index.php');
	}
}
