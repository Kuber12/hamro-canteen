<?php
require("connection.php");
require("../objects/Search.php");

$query =   $_GET['query'];
$columnName = $_GET['orderby'];
$sortby = $_GET['sortby'];


$search = new Search($conn);
try {
    $results = $search->orderBySort($columnName, $query, $sortby);
    echo json_encode($results);
} catch (Exception $e) {
  // Log the SQL error
  error_log("SQL Error: " . $e->getMessage());

  // Return an error response
  http_response_code(500); // Internal Server Error
  echo json_encode(array("error" => "An error occurred while executing the search."));
}
// echo json_encode(array("success" => "success"));
?>