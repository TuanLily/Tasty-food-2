<?php
function deleteDataFromChildTable($db, $value) {
    $sql = 'DELETE FROM child_table WHERE foreign_key = :value';
  
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':value', $value);
    
    try {
      $stmt->execute();
      echo "Đã xóa dữ liệu từ child_table thành công.\n";
    } catch (PDOException $e) {
      echo "Lỗi: " . $e->getMessage();
    }
  }
  
  function deleteDataFromMainTable($db, $value) {
    $sql = 'DELETE FROM main_table WHERE primary_key = :value';
  
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':value', $value);
    
    try {
      $stmt->execute();
      echo "Đã xóa dữ liệu từ main_table thành công.\n";
    } catch (PDOException $e) {
      echo "Lỗi: " . $e->getMessage();
    }
  }
?>