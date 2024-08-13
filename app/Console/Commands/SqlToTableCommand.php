<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SqlToTableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sqltt';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private array $indexList = [];
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $str = "
    account     varchar(32)      default ''  not null comment '后台管理员账号',
    head_pic    varchar(255)     default ''  not null comment '管理员头像',
    pwd         varchar(100)     default ''  not null comment '后台管理员密码',
    real_name   varchar(16)      default ''  not null comment '后台管理员姓名',
    roles       varchar(128)     default ''  not null comment '后台管理员权限(menus_id)',
    last_ip     varchar(16)      default ''  not null comment '后台管理员最后一次登录ip',
    last_time   int unsigned     default '0' not null comment '后台管理员最后一次登录时间',
    add_time    int unsigned     default '0' not null comment '后台管理员添加时间',
    login_count int unsigned     default '0' not null comment '登录次数',
    level       tinyint unsigned default '1' not null comment '后台管理员级别',
    status      tinyint unsigned default '1' not null comment '后台管理员状态 1有效0无效',
    division_id int              default 0   not null comment '事业部id',
    is_del      tinyint unsigned default '0' not null comment '是否删除'        ";
        $indexStr = "
        create index account
    on eb_system_admin (account);

create index status
    on eb_system_admin (status);

        ";


        $this->indexList = $this->setIndexList($indexStr);

        //dump($indexStr);

        $stList = explode("\n", trim($str));
        $tabStr = '';
        foreach ($stList as $k => $sst) {
            $sst = trim($sst);
            //dump($sst);
            if($sst){

                $tabStr .= $this->issetDefault($sst);

            }

        }
        dump($tabStr);

    }


    /**
     * 如果是带default的表
     * @param string $sst
     * @return string
     */
    public function issetDefault(string $sst): string
    {

        $sstList = explode(" ", $sst);

        $sstList = array_values(array_filter($sstList,function ($var){
            return $var!=="";
        }));
        $sqlStr = '$table->';
        $tableType = explode("(",$sstList[1]);
        $tableTypeName = $this->formatTableTypeName($tableType[0]);
        $tableName = $sstList[0];
        if(in_array($tableTypeName,['dateTime',"timestamp"])){
            if($tableName == "create_time") $tableName = "created_at";
            if($tableName == "update_time") $tableName = "updated_at";
            if($tableName == "delete_time") $tableName = "deleted_at";

        }

        $sqlStr .= $tableTypeName."('".$sstList[0] ."'";

        if(count($tableType)>1){
            $sqlStr.=",".rtrim($tableType[1],')');
        }
        $sqlStr .= ")";

        if(in_array($sstList[0], $this->indexList)){
            $sqlStr .= "->index()";
        }
        if($sstList[2]=="unsigned"){
            $sqlStr .= "->unsigned()";
        }

        if(!$this->isNotNullTable($sst)){
            $sqlStr .= "->nullable()";
        }

        if(str_contains($sst, "default")){
            $sqlStr .= "->default(".$this->getTableDefault($sst).")";
        }

        $sqlStr .= "->comment(";
        $sqlStr .= rtrim($this->getTableComment($sst),',');
        $sqlStr .= ");\n";

        return $sqlStr;
    }

    public function getTableDefault(string $sst): string
    {
        $sst = explode(" default ",$sst)[1];
        $separator = " not null comment ";
        if(!$this->isNotNullTable($sst)){
            $separator = " null comment ";
        }
        return trim(explode($separator,$sst)[0]);

    }

    public function isNotNullTable(string $sst): bool
    {
        return strpos($sst, " not null comment ");
    }

    public function getTableComment($sst):string
    {
        if($this->isNotNullTable($sst)){
            $str = explode(" not null comment ",$sst);
        }else{
            $str = explode(" null comment ",$sst);
        }

        return $str[1];
    }

    /**
     * 格式化表格字段类型
     * @param string $typeName
     * @return string
     */
    public function formatTableTypeName(string $typeName): string
    {
        return match ($typeName) {
            "tinyint" => "tinyInteger",
            "int" => "integer",
            "varchar" => "char",
            "bigint" => "bigInteger",
            "datetime" => "dateTime",
            default => $typeName,
        };
    }

    /**
     * 获取索引列表
     * @param $indexStr
     * @return array
     */
    public function setIndexList($indexStr)
    {
        $indexList = explode("\n",trim($indexStr));
        $indexList = array_filter($indexList, function ($val){

            if( strpos($val, "on")){
                return false;
            }
            if( $val == ""){
                return false;
            }
            return true;
        });

        $indexLists = [];
        foreach ($indexList as $index){
            $array = explode(" ", $index);
            $indexLists[] = end($array);
        }
        return $indexLists;
    }
}
