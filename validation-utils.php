<?php
    function isValidZip($zipCode) {
        return (preg_match('/^[0-9]{5}(-[0-9]{4})?$/', $zipCode)) ? true : false;
    }

    function doesUserExist($connect,$email){

        $result = mysqli_query($connect,"Select * from Users where Email = '$email';");

        $userMatch = mysqli_num_rows($result);

        // No user found
        if($userMatch === 0){
            return false;
        }

        return true;
    }

    function loginUser($connect,$email,$password){

        $result = mysqli_query($connect, "Select * from Users where Email = '$email';");
        $row = mysqli_fetch_assoc($result);
        $hashedPwd = $row['Password'];
        $isValid = password_verify($password,$hashedPwd);

        return $isValid;
    }


?>
