<?php

// Assuming you have a database connection established and stored in the $db variable

class Search {
  private $conn;

  public function __construct($conn) {
    $this->conn = $conn;
  }

  public function searchTable($tableName,$columnName, $query) {
    $query = '%' . $query . '%';
    $statement = $this->conn->prepare("SELECT * FROM $tableName WHERE $columnName LIKE ?");
    $statement->bind_param('s', $query);
    $statement->execute();
    $result = $statement->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $statement->close();

    return $rows;
  }
  public function orderBySort($columnName, $query,$sortby) {
    $query = '%' . $query . '%';
    $sql = "SELECT username,fullName,phone,payment,status,orderID,orderDate,gtotal FROM orders inner join users on orders.userID = users.userID WHERE $columnName LIKE ? ORDER BY $columnName $sortby";
    if (!empty($orderby)) {
      $sql .= " ";
    }
    $statement = $this->conn->prepare($sql);
    $statement->bind_param('s', $query);
    $statement->execute();

    $result = $statement->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    
    $statement->close();
    return $rows;
  }
}
?>
