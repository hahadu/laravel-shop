<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_product';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('商品id');
            $table->integer('mer_id')->unsigned()->default(0)->comment('商户Id(0为总后台管理员创建,不为0的时候是商户后台创建)');
            $table->char('image',256)->default('')->comment('商品图片');
            $table->char('recommend_image',256)->default('')->comment('推荐图');
            $table->char('slider_image',2000)->default('')->comment('轮播图');
            $table->char('store_name',128)->default('')->comment('商品名称');
            $table->char('store_info',256)->default('')->comment('商品简介');
            $table->char('keyword',256)->default('')->comment('关键字');
            $table->char('bar_code',15)->default('')->comment('商品条码（一维码）');
            $table->char('cate_id',64)->index()->default('')->comment('分类id');
            $table->decimal('price',12,2)->index()->unsigned()->default(0.00)->comment('商品价格');
            $table->decimal('vip_price',12,2)->unsigned()->default(0.00)->comment('会员价格');
            $table->decimal('ot_price',12,2)->unsigned()->default(0.00)->comment('市场价');
            $table->decimal('postage',12,2)->unsigned()->default(0.00)->comment('邮费');
            $table->char('unit_name',32)->default('')->comment('单位名');
            $table->smallint('sort')->index()->default(0)->comment('排序');
            $table->mediumint('sales')->index()->unsigned()->default(0)->comment('销量');
            $table->mediumint('stock')->unsigned()->default(0)->comment('库存');
            $table->tinyInteger('is_show',1)->index()->default(1)->comment('状态（0：未上架，1：上架）');
            $table->tinyInteger('is_hot',1)->index()->default(0)->comment('是否热卖');
            $table->tinyInteger('is_benefit',1)->index()->default(0)->comment('是否优惠');
            $table->tinyInteger('is_best',1)->index()->default(0)->comment('是否精品');
            $table->tinyInteger('is_new',1)->index()->default(0)->comment('是否新品');
            $table->tinyInteger('is_virtual',1)->default(0)->comment('商品是否是虚拟商品');
            $table->tinyInteger('virtual_type',1)->default(0)->comment('虚拟商品类型');
            $table->integer('add_time')->index()->unsigned()->default(0)->comment('添加时间');
            $table->tinyInteger('is_postage')->index()->unsigned()->default(0)->comment('是否包邮');
            $table->tinyInteger('is_del')->unsigned()->default(0)->comment('是否删除');
            $table->tinyInteger('mer_use')->unsigned()->default(0)->comment('商户是否代理 0不可代理1可代理');
            $table->integer('give_integral')->unsigned()->default(0)->comment('获得积分');
            $table->decimal('cost',12,2)->unsigned()->default(0.00)->comment('成本价');
            $table->tinyInteger('is_seckill')->unsigned()->default(0)->comment('秒杀状态 0 未开启 1已开启');
            $table->tinyInteger('is_bargain')->unsigned()->default(0)->comment('砍价状态 0未开启 1开启');
            $table->tinyInteger('is_good',1)->default(0)->comment('是否优品推荐');
            $table->tinyInteger('is_sub',1)->default(0)->comment('是否单独分佣');
            $table->tinyInteger('is_vip',1)->default(0)->comment('是否开启会员价格');
            $table->mediumint('ficti')->default(0)->comment('虚拟销量');
            $table->integer('browse')->default(0)->comment('浏览量');
            $table->char('code_path',64)->default('')->comment('商品二维码地址(用户小程序海报)');
            $table->char('soure_link',255)->default('')->comment('淘宝京东1688类型');
            $table->char('video_link',500)->default('')->comment('主图视频链接');
            $table->integer('temp_id')->default(1)->comment('运费模板ID');
            $table->tinyInteger('spec_type',1)->default(0)->comment('规格 0单 1多');
            $table->char('activity',255)->default('')->comment('活动显示排序1=秒杀，2=砍价，3=拼团');
            $table->char('spu',13)->default('')->comment('商品SPU');
            $table->char('label_id',64)->default('')->comment('标签ID');
            $table->char('command_word',255)->default('')->comment('复制口令');
            $table->char('recommend_list',255)->default('')->comment('推荐商品id');
            $table->tinyInteger('vip_product',1)->default(0)->comment('是否会员专属商品');
            $table->tinyInteger('presale',1)->default(0)->comment('是否预售商品');
            $table->integer('presale_start_time')->default(0)->comment('预售开始时间');
            $table->integer('presale_end_time')->default(0)->comment('预售结束时间');
            $table->integer('presale_day')->default(0)->comment('预售结束后几天内发货');
            $table->char('logistics',10)->default('1,2')->comment('物流方式');
            $table->tinyInteger('freight',1)->default(2)->comment('运费设置');
            $table->char('custom_form',2000)->default('')->comment('自定义表单');
            $table->tinyInteger('is_limit',1)->default(0)->comment('是否开启限购');
            $table->tinyInteger('limit_type',1)->default(0)->comment('限购类型1单次限购2永久限购');
            $table->integer('limit_num')->default(0)->comment('限购数量');
            $table->integer('min_qty')->default(1)->comment('起购数量');
        });
        $this->setTableComment($this->table_name, '商品表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
