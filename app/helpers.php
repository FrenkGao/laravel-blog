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

/**
 * @param $mimeType
 * @return bool
 */
function is_image($mimeType) {
    return starts_with($mimeType, 'image/');
}

/**
 * 用于在视图的复选框和单选框中设置 checked 属性。
 * @param $value
 * @return string
 */
function checked($value) {
    return $value? 'checked':'';
}

/**
 * 返回上传图片的完整路径。
 * @param null $value
 * @return mixed|null|string
 */
function page_image($value=null){
    if (empty($value)){
        $value=config('blog.page_image');
    }
    if (! starts_with($value,'http')&&$value[0]!=='/'){
        $value=config('blog.uploads.webpath').'/'.$value;
    }
    return $value;
}