<?php

if ($_SERVER['REQUEST_URI'] === '/printinglabmy/admin') {
  header('Location: www/admin/index.php');
  exit;
}

header('Location: www/index.php');
exit;
