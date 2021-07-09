<?php
  function resultToArray($result, $indexKey) {
    $rows = array();
    while($row = $result->fetch_assoc()){
      $rows[$row[$indexKey]] = $row;
    }
    return $rows;
  }
?>