<?php
function RemoveSelect_ma($del)
{
    $sql = "UPDATE mon_an SET trang_thai = 0 WHERE id in ($del)";
    pdo_execute($sql);
}
function RestoreSelect_ma($del)
{
    $sql = "UPDATE mon_an SET trang_thai = 1 WHERE id in ($del)";
    pdo_execute($sql);
}
function RemoveSelect_dm($del)
{
    $sql = "UPDATE danh_muc SET trang_thai = 0 WHERE id in ($del)";
    pdo_execute($sql);
}
function RestoreSelect_dm($del)
{
    $sql = "UPDATE danh_muc SET trang_thai = 1 WHERE id in ($del)";
    pdo_execute($sql);
}
function RemoveSelect_taikhoan($del)
{
    $sql = "DELETE FROM taikhoan where id in ($del)";
    pdo_execute($sql);
}
function RemoveSelect_bl($del)
{
    $sql = "DELETE FROM binhluan where id in ($del)";
    pdo_execute($sql);
}
function RemoveSelect_thongke($del)
{
    $sql = "DELETE FROM thongke where id in ($del)";
    pdo_execute($sql);
}
function RemoveSelect_bill($del)
{
    $sql = "DELETE FROM bill where id in ($del)";
    pdo_execute($sql);
}
?>