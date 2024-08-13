<?php


namespace App;

//use Hahadu\Reflector\Reflection;
use ReflectionClass;
use ReflectionClassConstant;

/**
 * @group 错误码
 * 根据错误码获取状态信息
 * 使用方法：
 * 定义一个错误码constant
 * 添加注释说明
 */
class ErrorCode
{

    /** success */
    const SUCCESS = 0;

    /** 操作失败  */
    const FAIL = 10000; // 未知错误
    /** 哎呀~ 你看啥呢 (●￣(ｴ)￣●))!  */
    const PAGE_NOT_FOUND = 404; // 未知错误

    /** 表单验证不通过 */
    const REQUEST_FIELD_FAIL_ALLOW = 422;
    //user
    /** 账号或手机号已被他人使用*/
    const USER_LOGIN_USER_EXISTS = 20010003 ; //账号已存在

    /** 请登录 */
    const USER_UNAUTHENTICATED = 2010004;
    /** 账号不存在 */
    const USER_LOGIN_USER_EMPTY = 20010001 ; //账号不存在
    /** 密码错误 */
    const USER_LOGIN_PASSWORD_FAIL = 20010002 ; //密码错误


    //Product
    /** 商品不存在 */
    const PRODUCT_QUERY_FIND_EMPTY = 5001001;//商品不存在

    // filemanager7000000
    /** 文件夹不存在 */
    const FILEMANAGER_FOLDER_PATH_EMPTY = 7001001;
    /** 文件不存在 */
    const FILEMANAGER_FILE_URI_EMPTY = 7001002;
    /** 文件保存失败 */
    const FILEMANAGER_FILE_FORM_DATA_SAVE_EMPTY = 7002003;
    /** 文件不能为空 */
    const FILEMANAGER_FILE_FORM_DATA_STREAM_EMPTY = 7002003;
    /** 文件夹不能为空 */
    const FILEMANAGER_FOLDER_FORM_DATA_URI_EMPTY = 7002004;

    /** 不正确的二维码图片 */
    const FILEMANAGER_QRCODE_IMAGE_SCAN_DATA_ROW_ALLOW_FAIL = 7009001;
    /** 文件大小超限 */
    const FILEMANAGER_FILE_URI_SIZE_DATA_ROW_ALLOW_FAIL = 7009101;


    public static function getErrorMessage($code = self::FAIL){
        if($code===self::SUCCESS){
            return 'success';
        }
        $selfClass = new self();
        $class = new ReflectionClass($selfClass);
        $Constant = array_search($code,$class->getConstants());

        $doc = new ReflectionClassConstant($selfClass,$Constant);
        $docblock = new Reflection($doc);

        $name = $docblock->getText();
        if(null==$name){
            return '操作失败';
        }
        return $name;
    }
}
