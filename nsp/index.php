<?php

require_once './controllers/HomeController.php';
require_once './controllers/InvoiceController.php';
require_once './controllers/ProductController.php';
require_once './models/invoice.php';
require_once './models/Product.php';
require_once './models/User.php';

use Controllers\HomeController;

$home = new HomeController();

use Controllers\InvoiceController;

$invoice = new InvoiceController();
