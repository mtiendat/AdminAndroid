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
            $table->string('MoTa')->nullable();
            $table->text('NoiDung')->nullable();
            $table->string('HinhAnh')->nullable();
            $table->string('TieuDeHinhAnh')->nullable();
            $table->string('NgayDang')->nullable();
            $table->Integer('TrangThai')->nullable();
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
