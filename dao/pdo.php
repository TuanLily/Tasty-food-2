<?php

/**
 * Mở kết nối đến CSDL sử dụng PDO
 */
function pdo_get_connection()
{
    $dburl = "mysql:host=localhost;dbname=tastyfood;charset=utf8";
    $username = 'root';
    $password = 'mysql';

    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}


/**
 * Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_execute_lastInsertId($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query($sql, ...$sql_args)
{
    $conn = null; // Initialize the $conn variable

    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        // Handle the exception or log the error message
        // instead of re-throwing the exception immediately
        error_log("PDOException: " . $e->getMessage());
        return false; // Return a falsy value to indicate error
    } finally {
        if ($conn !== null) {
            unset($conn);
        }
    }
}
/**
 * Thực thi câu lệnh sql truy vấn một bản ghi
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng chứa bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn một giá trị
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return giá trị
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);

    $conn = null;
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return array_values($row)[0];
        } else {
            return null; // Trả về null nếu không có dữ liệu
        }
    } catch (PDOException $e) {
        throw $e;
    } finally {
        if ($conn) {
            $conn = null; // Đảm bảo rằng kết nối được đóng đúng cách
        }
    }
}

function pdo_prepare($pdo, $sql, $params = [])
{
    // Kiểm tra kết nối PDO
    if (!$pdo) {
        return false;
    }

    // Tạo đối tượng PDOStatement
    $stmt = $pdo->prepare($sql);

    // Kiểm tra lỗi khi chuẩn bị truy vấn
    if (!$stmt) {
        return false;
    }

    // Gắn các tham số vào câu truy vấn
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }

    // Trả về kết quả
    return $stmt;
}
// function pdo_prepare($pdo, $sql, $params = [])
// {
//     // Kiểm tra kết nối PDO
//     if (!$pdo) {
//         return false;
//     }

//     try {
//         // Tạo đối tượng PDOStatement
//         $stmt = $pdo->prepare($sql);

//         // Kiểm tra lỗi khi chuẩn bị truy vấn
//         if (!$stmt) {
//             return false;
//         }

//         // Gắn các tham số vào câu truy vấn
//         foreach ($params as $key => $value) {
//             $stmt->bindValue($key, $value);
//         }

//         // Trả về kết quả
//         return $stmt;
//     } catch (PDOException $e) {
//         // Handle PDOException if needed
//         return false;
//     }
// }


// Hàm bindValues này nhìn chung có vẻ giống với việc thay thế các giá trị tham số 
// trong câu truy vấn SQL bằng các giá trị tương ứng

function bindValues($sql, $params)
{
    foreach ($params as $key => $value) {
        $sql = str_replace($key, "'" . $value . "'", $sql);
    }
    return $sql;
}
