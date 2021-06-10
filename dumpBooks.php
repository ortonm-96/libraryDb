<?php
// Test file - dump the books table out

$testSqlStatement = 'SELECT * FROM books';

$statement = $pdo->prepare($testSqlStatement);
$statement->execute();
$booksDump = $statement->fetchAll();
print_r($booksDump)
?>