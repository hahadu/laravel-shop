<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_notification';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->char('mark',50)->default('')->comment('标识');
            $table->char('name',50)->default('')->comment('通知类型');
            $table->char('title',100)->default('')->comment('通知场景说明');
            $table->tinyInteger('is_system',1)->default(0)->comment('站内信（0：不存在，1：开启，2：关闭）');
            $table->char('system_title',256)->default('')->comment('站内信标题');
            $table->char('system_text',512)->default('')->comment('系统消息id');
            $table->tinyInteger('is_wechat',1)->default(0)->comment('公众号模板消息（0：不存在，1：开启，2：关闭）');
            $table->char('wechat_tempkey',255)->default('')->comment('模版消息tempkey');
            $table->char('wechat_content',255)->default('')->comment('模版消息内容');
            $table->char('wechat_kid',255)->default('')->comment('模版消息kid');
            $table->char('wechat_tempid',255)->default('')->comment('模版消息tempid');
            $table->char('wechat_data',255)->default('')->comment('模版消息参数');
            $table->char('wechat_link',255)->default('')->comment('模版消息链接');
            $table->integer('wechat_to_routine')->default(0)->comment('模版消息跳转小程序');
            $table->tinyInteger('is_routine',1)->default(0)->comment('小程序订阅消息（0：不存在，1：开启，2：关闭）');
            $table->char('routine_tempkey',255)->default('')->comment('订阅消息id');
            $table->char('routine_content',255)->default('')->comment('订阅消息内容');
            $table->char('routine_kid',255)->default('')->comment('订阅消息kid');
            $table->char('routine_tempid',255)->default('')->comment('订阅消息tempid');
            $table->char('routine_data',255)->default('')->comment('订阅消息参数');
            $table->char('routine_link',255)->default('')->comment('订阅消息链接');
            $table->tinyInteger('is_sms',1)->default(0)->comment('发送短信（0：不存在，1：开启，2：关闭）');
            $table->char('sms_id',32)->default('')->comment('短信id');
            $table->char('sms_text',255)->default('')->comment('短信模版内容');
            $table->tinyInteger('is_ent_wechat',1)->default(0)->comment('企业微信群通知（0：不存在，1：开启，2：关闭）');
            $table->char('ent_wechat_text',512)->default('')->comment('企业微信消息');
            $table->char('url',512)->default('')->comment('群机器人链接');
            $table->tinyInteger('is_app',1)->default(0)->comment('APP推送（0：不存在，1：开启，2：关闭）');
            $table->integer('app_id')->default(0)->comment('app推送id');
            $table->char('variable',256)->default('')->comment('变量');
            $table->tinyInteger('type',1)->default(1)->comment('类型（1：用户，2：管理员）');
            $table->integer('add_time')->default(0)->comment('添加时间');
            $table->char('custom_trigger',255)->default('')->comment('自定义消息触发位置');
            $table->char('custom_variable',1000)->default('')->comment('自定义消息变量');
        });
        $this->setTableComment($this->table_name, '通知设置');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
