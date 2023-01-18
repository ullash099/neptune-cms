<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCategoriesTable extends Migration
{
    private $data = [
        [
            'name'          =>  'uncategorized',
            'name_l'        =>  'শ্রেণী বহির্ভূত',
            'slug'          =>  'uncategorized',
            'slug_l'        =>  'শ্রেণী-বহির্ভূত',
            'created_by'    =>  1
        ]
    ];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            
            $table->integer('parent_id')->nullable();
            
            $table->string('name')->collation('utf16_general_ci');
            $table->string('name_l')->nullable()->collation('utf16_general_ci');
            
            $table->string('slug')->unique()->collation('utf16_general_ci');
            $table->string('slug_l')->collation('utf16_general_ci');

            $table->foreignId('media_id')->nullable()->constrained('media');

            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');

            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('blog_categories')->insert($this->data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_categories');
    }
}
