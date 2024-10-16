<?php

// Hàm này trả về giá trị role là 0 hoặc 1
// function check_user($email, $password) {
//     $conn = connectdb();
//     $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
//     $stmt->bindParam(':email', $email);
//     $stmt->execute();
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     $kq = $stmt->fetchAll();
    
//     if (count($kq) > 0 && password_verify($password, $kq[0]['password'])) {
//         return $kq[0]['role_id'];
//     } else {
//         return 0;
//     }
// }




function get_userinfo($email, $password){
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetch();

    if ((count($kq)>0) && password_verify($password, $kq['password'])) {
        return $kq;
    }
}

?>
