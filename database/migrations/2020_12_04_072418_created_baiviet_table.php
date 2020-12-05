<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatedBaivietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baiviet', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id')->unsigned();
            $table->string('TieuDe')->nullable();
            $table->integer('DanhMuc')->unsigned()->nullable();
            $table->foreign('DanhMuc')->references('id')->on('danhmuc');
            $table->string('MoTa');
            $table->text('NoiDung');
            $table->string('HinhAnh');
            $table->string('TieuDeHinhAnh');
            $table->string('NgayDang');
            $table->string('TacGia');
            $table->Integer('TrangThai');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baiviet');
    }
}
