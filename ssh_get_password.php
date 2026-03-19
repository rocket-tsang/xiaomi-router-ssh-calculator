#!/usr/bin/env php
<?php
//路由器固件解包后，从 /bin/mkxqimage 中提取的盐
$salt = array(
    'r1d' => 'A2E371B0-B34B-48A5-8C40-A7133F3B5D88',
    'others' => 'd44fb0960aa0-a5e6-4a30-250f-6d2df50a'
);

isset($argv[1]) or die('Usage: ' . $argv[0] . " SN\n");
print_line(get_passwd($argv[1]));

function print_line($message) {
    echo $message . "\n";
}

//密码算法：
//原始 SN 拼接反转后的盐，做 md5 运算取前 8 个字符
function get_passwd($sn) {
    return substr(md5($sn . get_salt($sn)), 0, 8);
}

// SN 中不含 '/' 则为 r1d
function get_salt($sn) {
    global $salt;
    if (false === strpos($sn, '/')) {
        return $salt['r1d'];
    } else {
        return swap_salt($salt['others']);
    }
}

//非 R1D 盐要反转后才能使用
function swap_salt($salt) {
    return implode('-', array_reverse(explode('-', $salt)));
}
