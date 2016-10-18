<?php

function flash($title = null, $message = null){
    $flash = app('App\Http\Flash');

    if(func_num_args() == 0){
        return $flash;
    }

    return $flash->info($title, $message);
}

/**
 * 返回可读性更好的文件尺寸
 */
function human_filesize($bytes, $decimals = 2)
{
    $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .@$size[$factor];
}

/**
 * 判断文件的MIME类型是否为图片
 */
function is_image($mimeType)
{
    return starts_with($mimeType, 'image/');
}


function searchKeyExist($inputs)
{
    if(array_key_exists('provinceName', $inputs))
    {
        return 1;
    }else{
        return 0;
    }
}

function getProvinceNameForSearch($inputs)
{
    $provinceName = [];
    foreach(\App\Province::all() as $province)
    {
        if(fnmatch("*".$inputs['provinceName']."*", $province->name))
        {
            $provinceName[] = $province->name;
        }
    }

    return $provinceName;
}