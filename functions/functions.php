<?php
  
  function isValid($id, $model) {
    $query = 'SELECT id FROM ' . $model->getTable() . ' WHERE id = :id';
    
    $stmt = $model->getConn()->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    if ($stmt->errorCode() !== '00000') {
      $errorInfo = $stmt->errorInfo();
      echo "Error: " . $errorInfo[2];
  }

    $numRows = $stmt->rowCount();
    echo "Query: $query\nID: $id\nNum Rows: $numRows\n";
    return $numRows > 0;
    //return $stmt->rowCount() > 0;
}