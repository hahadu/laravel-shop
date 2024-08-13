<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'wechat_user';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('uid')->index()->unsigned()->default(0)->comment('微信用户id');
            $table->char('unionid',30)->index()->default('')->comment('只有在用户将公众号绑定到微信开放平台帐号后，才会出现该字段');
            $table->char('openid',255)->index()->default('')->comment('用户的标识，对当前公众号唯一');
            $table->char('nickname',64)->default('')->comment('用户的昵称');
            $table->char('headimgurl',256)->default('')->comment('用户头像');
            $table->tinyInteger('sex')->unsigned()->default(0)->comment('用户的性别，值为1时是男性，值为2时是女性，值为0时是未知');
            $table->char('city',64)->default('')->comment('用户所在城市');
            $table->char('language',64)->default('')->comment('用户的语言，简体中文为zh_CN');
            $table->char('province',64)->default('')->comment('用户所在省份');
            $table->char('country',64)->default('')->comment('用户所在国家');
            $table->char('remark',256)->default('')->comment('公众号运营者对粉丝的备注，公众号运营者可在微信公众平台用户管理界面对粉丝添加备注');
            $table->smallint('groupid')->index()->unsigned()->default(0)->comment('用户所在的分组ID（兼容旧的用户分组接口）');
            $table->char('tagid_list',256)->default('')->comment('用户被打上的标签ID列表');
            $table->tinyInteger('subscribe')->index()->unsigned()->default(1)->comment('用户是否订阅该公众号标识');
            $table->integer('subscribe_time')->index()->unsigned()->default(0)->comment('关注公众号时间');
            $table->integer('add_time')->index()->unsigned()->default(0)->comment('添加时间');
            $table->integer('second')->unsigned()->default(0)->comment('二级推荐人');
            $table->char('user_type',32)->default('wechat')->comment('用户类型');
            $table->tinyInteger('is_complete',1)->default(0)->comment('信息是否完善');
            $table->tinyInteger('is_del',1)->default(0)->comment('是否注销');
        });
        $this->setTableComment($this->table_name, '微信用户表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
