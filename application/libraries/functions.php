<?php

// Hàm xử lý slug
function slug($string) {
    $tenbv = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $tenbv);
    $tenbv = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $tenbv);
    $tenbv = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $tenbv);
    $tenbv = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $tenbv);
    $tenbv = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $tenbv);
    $tenbv = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $tenbv);
    $tenbv = preg_replace("/(đ)/", "d", $tenbv);
    $tenbv = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $tenbv);
    $tenbv = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $tenbv);
    $tenbv = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $tenbv);
    $tenbv = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $tenbv);
    $tenbv = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $tenbv);
    $tenbv = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $tenbv);
    $tenbv = preg_replace("/(Đ)/", "D", $tenbv);
    $tenbv = str_replace(" ", "-", $tenbv);
    $tenbv = strtolower($tenbv);
    return $tenbv;
}