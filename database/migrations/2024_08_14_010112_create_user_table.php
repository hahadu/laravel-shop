<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'user';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->integer('uid')->autoIncrement()->unsigned()->comment('用户id');
            $table->char('account',32)->index()->default('')->comment('用户账号');
            $table->char('pwd',32)->default('')->comment('用户密码');
            $table->char('real_name',25)->default('')->comment('真实姓名');
            $table->integer('birthday')->default(0)->comment('生日');
            $table->char('card_id',20)->default('')->comment('身份证号码');
            $table->char('mark',255)->default('')->comment('用户备注');
            $table->integer('partner_id')->default(0)->comment('合伙人id');
            $table->integer('group_id')->default(0)->comment('用户分组id');
            $table->char('nickname',60)->default('')->comment('用户昵称');
            $table->char('avatar',255)->default('')->comment('用户头像');
            $table->char('phone',15)->default('')->comment('手机号码');
            $table->integer('add_time')->unsigned()->default(0)->comment('添加时间');
            $table->char('add_ip',16)->default('')->comment('添加ip');
            $table->integer('last_time')->unsigned()->default(0)->comment('最后一次登录时间');
            $table->char('last_ip',16)->default('')->comment('最后一次登录ip');
            $table->decimal('now_money',12,2)->unsigned()->default(0.00)->comment('用户余额');
            $table->decimal('brokerage_price',12,2)->default(0.00)->comment('佣金金额');
            $table->integer('integral')->unsigned()->default(0)->comment('用户剩余积分');
            $table->decimal('exp',12,2)->default(0.00)->comment('会员经验');
            $table->integer('sign_num')->default(0)->comment('连续签到天数');
            $table->tinyInteger('sign_remind')->default(0)->comment('签到提醒状态');
            $table->tinyInteger('status')->index()->default(1)->comment('1为正常，0为禁止');
            $table->tinyInteger('level')->index()->unsigned()->default(0)->comment('等级');
            $table->integer('agent_level')->default(0)->comment('分销等级');
            $table->tinyInteger('spread_open')->default(1)->comment('是否有推广资格');
            $table->integer('spread_uid')->unsigned()->default(0)->comment('推广元id');
            $table->integer('spread_time')->unsigned()->default(0)->comment('推广员关联时间');
            $table->char('user_type',32)->default('')->comment('用户类型');
            $table->tinyInteger('is_promoter')->index()->unsigned()->default(0)->comment('是否为推广员');
            $table->integer('pay_count')->unsigned()->default(0)->comment('用户购买次数');
            $table->integer('spread_count')->default(0)->comment('下级人数');
            $table->integer('clean_time')->default(0)->comment('清理会员时间');
            $table->char('addres',255)->default('')->comment('详细地址');
            $table->integer('adminid')->unsigned()->default(0)->comment('管理员编号 ');
            $table->char('login_type',36)->default('')->comment('用户登陆类型，h5,wechat,routine');
            $table->char('record_phone',11)->default(0)->comment('记录临时电话');
            $table->tinyInteger('is_money_level')->default(0)->comment('会员来源  0: 购买商品升级   1：花钱购买的会员2: 会员卡领取');
            $table->tinyInteger('is_ever_level')->default(0)->comment('是否永久性会员  0: 非永久会员  1：永久会员');
            $table->bigInteger('overdue_time')->default(0)->comment('会员到期时间');
            $table->char('uniqid',32)->default('')->comment('用户唯一值');
            $table->char('division_name',255)->default('')->comment('事业部/代理商名称');
            $table->tinyInteger('division_type')->default(0)->comment('代理类型：0普通，1事业部，2代理，3员工');
            $table->tinyInteger('division_status')->default(0)->comment('代理状态');
            $table->tinyInteger('is_division')->default(0)->comment('事业部状态');
            $table->tinyInteger('is_agent')->default(0)->comment('代理状态');
            $table->tinyInteger('is_staff')->default(0)->comment('员工状态');
            $table->integer('division_id')->default(0)->comment('事业部id');
            $table->integer('agent_id')->default(0)->comment('代理商id');
            $table->integer('staff_id')->default(0)->comment('员工id');
            $table->integer('division_percent')->default(0)->comment('分佣比例');
            $table->integer('division_change_time')->default(0)->comment('事业部/代理/员工修改时间');
            $table->integer('division_end_time')->default(0)->comment('事业部/代理/员工结束时间');
            $table->integer('division_invite')->default(0)->comment('代理商邀请码');
            $table->tinyInteger('is_del')->default(0)->comment('是否注销');
        });
        $this->setTableComment($this->table_name, '用户表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
