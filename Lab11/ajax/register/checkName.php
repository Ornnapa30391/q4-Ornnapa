<?php

// เชื่อมต่อกับฐานข้อมูล
include "connect.php";

// เตรียมคำสั่ง SQL ให้พร้อมเพื่อค้นหาชื่อผู้ใช้ที่ตรงกัน
$takenUsernames = $pdo->prepare("SELECT username FROM member WHERE username = :username");
$takenUsernames->execute(['username' => $_GET["username"]]);

// หน่วงเวลา 1 วินาที (สามารถลบออกได้)
sleep(1);

// ตรวจสอบว่ามีแถวข้อมูลที่ส่งกลับมาหรือไม่
if ($takenUsernames->rowCount() > 0) {
    echo "denied"; // ถ้าชื่อผู้ใช้มีอยู่แล้วในฐานข้อมูล
} else {
    echo "okay"; // ถ้าชื่อผู้ใช้ยังไม่ถูกใช้
}

?>
