<?php
/**
 * 返回一个更加可读的尺寸
 * @param $bytes
 * @param int $decimals
 * @return int
 */
function human_filesize($bytes, $decimals = 2) {
    $size = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) ." ". $size[$factor];
}

function is_image($mimeType) {
    return starts_with($mimeType, 'image/');
}
function checked($value) {
    return $value? 'checked':'';
}
function page_image($value=null){
    if (empty($value)){
        $value=config('blog.page_image');
    }
    if (! starts_with($value,'http')&&$value[0]!=='/'){
        $value=config('blog.uploads.webpath').'/'.$value;
    }
    return $value;
}