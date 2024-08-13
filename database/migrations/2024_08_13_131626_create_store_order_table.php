<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_order';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('订单ID');
            $table->integer('pid')->default(0)->comment('父类订单id');
            $table->char('order_id',32)->default(0)->comment('订单号');
            $table->char('trade_no',100)->default('')->comment('支付宝订单号');
            $table->integer('uid')->index()->unsigned()->default(0)->comment('用户id');
            $table->char('real_name',32)->default('')->comment('用户姓名');
            $table->char('user_phone',18)->default('')->comment('用户电话');
            $table->char('user_address',100)->default('')->comment('详细地址');
            $table->text('cart_id')->nullable()->comment('购物车id');
            $table->decimal('freight_price',12,2)->default(0.00)->comment('运费金额');
            $table->integer('total_num')->unsigned()->default(0)->comment('订单商品总数');
            $table->decimal('total_price',12,2)->unsigned()->default(0.00)->comment('订单总价');
            $table->decimal('total_postage',12,2)->unsigned()->default(0.00)->comment('邮费');
            $table->decimal('pay_price',12,2)->index()->unsigned()->default(0.00)->comment('实际支付金额');
            $table->decimal('pay_postage',12,2)->unsigned()->default(0.00)->comment('支付邮费');
            $table->decimal('deduction_price',12,2)->unsigned()->default(0.00)->comment('抵扣金额');
            $table->integer('coupon_id')->index()->unsigned()->default(0)->comment('优惠券id');
            $table->decimal('coupon_price',12,2)->unsigned()->default(0.00)->comment('优惠券金额');
            $table->tinyInteger('paid')->index()->unsigned()->default(0)->comment('支付状态');
            $table->integer('pay_time')->index()->unsigned()->default(0)->comment('支付时间');
            $table->char('pay_type',32)->index()->default('')->comment('支付方式');
            $table->integer('add_time')->index()->unsigned()->default(0)->comment('创建时间');
            $table->tinyInteger('status',1)->index()->default(0)->comment('订单状态（-1 : 申请退款 -2 : 退货成功 0：待发货；1：待收货；2：已收货；3：待评价；-1：已退款）');
            $table->tinyInteger('is_stock_up',1)->default(0)->comment('是否备货中');
            $table->tinyInteger('refund_status')->unsigned()->default(0)->comment('0 未退款 1 申请中 2 已退款');
            $table->tinyInteger('refund_type',1)->default(0)->comment('退款申请类型');
            $table->char('refund_express',255)->default('')->comment('退货快递单号');
            $table->char('refund_express_name',255)->default('')->comment('退货快递名称');
            $table->char('refund_reason_wap_img',2000)->default('')->comment('退款图片');
            $table->char('refund_reason_wap_explain',255)->default('')->comment('退款用户说明');
            $table->integer('refund_reason_time')->unsigned()->default(0)->comment('退款时间');
            $table->char('refund_reason_wap',255)->default('')->comment('前台退款原因');
            $table->char('refund_reason',255)->default('')->comment('不退款的理由');
            $table->decimal('refund_price',12,2)->unsigned()->default(0.00)->comment('退款金额');
            $table->char('delivery_name',64)->default('')->comment('快递名称/送货人姓名');
            $table->char('delivery_code',50)->default('')->comment('快递公司编码');
            $table->char('delivery_type',32)->default('')->comment('发货类型');
            $table->char('delivery_id',64)->default('')->comment('快递单号/手机号');
            $table->char('kuaidi_label',255)->default('')->comment('快递单号图片');
            $table->char('kuaidi_task_id',64)->default('')->comment('快递单任务id');
            $table->char('kuaidi_order_id',64)->default('')->comment('快递单订单号');
            $table->char('fictitious_content',500)->default('')->comment('虚拟发货内容');
            $table->integer('delivery_uid')->default(0)->comment('配送员id');
            $table->decimal('gain_integral',12,2)->unsigned()->default(0.00)->comment('消费赚取积分');
            $table->decimal('use_integral',12,2)->unsigned()->default(0.00)->comment('使用积分');
            $table->decimal('back_integral',12,2)->unsigned()->default(0.00)->comment('给用户退了多少积分');
            $table->integer('spread_uid')->default(0)->comment('推广人uid');
            $table->integer('spread_two_uid')->default(0)->comment('上上级推广人uid');
            $table->decimal('one_brokerage',12,2)->default(0.00)->comment('一级返佣金额');
            $table->decimal('two_brokerage',12,2)->default(0.00)->comment('二级返佣金额');
            $table->char('mark',512)->default('')->comment('备注');
            $table->tinyInteger('is_del')->index()->unsigned()->default(0)->comment('是否删除');
            $table->char('unique',32)->index()->default('')->comment('唯一id(md5加密)类似id');
            $table->char('remark',512)->default('')->comment('管理员备注');
            $table->integer('mer_id')->unsigned()->default(0)->comment('商户ID');
            $table->tinyInteger('is_mer_check')->unsigned()->default(0)->comment('商户上传');
            $table->integer('combination_id')->unsigned()->default(0)->comment('拼团商品id0一般商品');
            $table->integer('pink_id')->unsigned()->default(0)->comment('拼团id 0没有拼团');
            $table->decimal('cost',12,2)->unsigned()->default(0.00)->comment('成本价');
            $table->integer('seckill_id')->unsigned()->default(0)->comment('秒杀商品ID');
            $table->integer('bargain_id')->unsigned()->default(0)->comment('砍价id');
            $table->integer('advance_id')->default(0)->comment('预售商品id');
            $table->char('verify_code',12)->default('')->comment('核销码');
            $table->integer('store_id')->default(0)->comment('门店id');
            $table->tinyInteger('shipping_type',1)->default(1)->comment('配送方式 1=快递 ，2=门店自提');
            $table->integer('clerk_id')->default(0)->comment('店员id');
            $table->tinyInteger('is_channel')->unsigned()->default(0)->comment('支付渠道(0微信公众号1微信小程序)');
            $table->tinyInteger('is_remind')->unsigned()->default(0)->comment('消息提醒');
            $table->tinyInteger('is_system_del',1)->default(0)->comment('后台是否删除');
            $table->char('channel_type',255)->default('')->comment('用户访问端标识');
            $table->char('province',255)->default('')->comment('用户省份');
            $table->char('express_dump',502)->default('')->comment('订单面单打印信息');
            $table->tinyInteger('virtual_type',1)->default(0)->comment('虚拟商品类型');
            $table->char('virtual_info',255)->default('')->comment('虚拟商品信息');
            $table->integer('pay_uid')->default(0)->comment('支付用户uid');
            $table->text('custom_form')->nullable()->comment('自定义表单');
            $table->integer('staff_id')->default(0)->comment('员工id');
            $table->integer('agent_id')->default(0)->comment('代理id');
            $table->integer('division_id')->default(0)->comment('事业部id');
            $table->decimal('staff_brokerage',12,2)->default(0.00)->comment('员工返佣');
            $table->decimal('agent_brokerage',12,2)->default(0.00)->comment('代理返佣');
            $table->decimal('division_brokerage',12,2)->default(0.00)->comment('事业部返佣');
        });
        $this->setTableComment($this->table_name, '订单表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
