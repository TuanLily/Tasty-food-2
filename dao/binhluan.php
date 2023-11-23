<?php
function insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan)
{
    $sql = "insert into binhluan(noidung,iduser,idpro,ngaybinhluan) values('$noidung', '$iduser', '$idpro', '$ngaybinhluan')";
    pdo_execute($sql);
}

function loadall_binhluan($idpro)
{
    $sql = "select * from binhluan where 1";
    ;
    if ($idpro > 0) {
        $sql .= " and idpro='" . $idpro . "'";
    }
    $sql .= " order by id asc";
    $listbl = pdo_query($sql);
    return $listbl;
}

/**
 * Xóa bình luận
 * @param mixed $id
 * @return void
 */
function delete_binhluan($id)
{
    $sql = "delete from binhluan where id=" . $id;
    pdo_execute($sql);
}


function getBinhLuan_limit($start, $limit)
{

    $sql = "select * from binhluan order by id desc limit $start,$limit";
    $tk = pdo_query($sql);
    return $tk;
}

?>