
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = pg_connect("
    host=127.0.0.1 
    port=5432 
    dbname=postgres 
    user=postgres 
    password=1234
");

if (!$conn) {
    die("❌ Connection FAILED");
} else {
    echo "✅ Connected Successfully";
}
?>
