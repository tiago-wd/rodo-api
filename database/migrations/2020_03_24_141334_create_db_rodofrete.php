<?php

use App\Helpers\EnumHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbRodofrete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("transport_types", function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            
            $table->timestamps();
        });

        Schema::create("transports", function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('brand');
            $table->string('color');
            $table->string('plate');
            
            $table->integer('transport_type_id')->unsigned();
            $table->foreign('transport_type_id')->references('id')->on('transport_types');
            
            $table->timestamps();
        });

        Schema::create("cargo_types", function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            
            $table->timestamps();
        });

        Schema::create("cargos", function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->float('weight', 8, 8);
            $table->float('price', 8, 2)->nullable();
            $table->point('from_where', 'GEOMETRY', 4326);
            $table->point('to_where', 'GEOMETRY', 4326);
            
            $table->integer('cargo_type_id')->unsigned();
            $table->foreign('cargo_type_id')->references('id')->on('cargo_types');
            
            $table->timestamps();
        });

        Schema::create('cargo_transports', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('transport_type_id')->unsigned();
            $table->foreign('transport_type_id')->references('id')->on('transport_types');

            $table->integer('cargo_type_id')->unsigned();
            $table->foreign('cargo_type_id')->references('id')->on('cargo_types');

            $table->timestamps();
        });

        Schema::create('attachments', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('uuid', 64);
            $table->string('disk', 32);
            $table->string('filepath', 512);
            $table->string('filename', 128);
            $table->string('filetype', 512);
            $table->integer('filesize');
            $table->string('key', 64);
            $table->string('title', 92);
            $table->text('description');
            $table->string('preview_url', 512);
            $table->integer('model_id');
            $table->string('model_typer', 64);
            
            $table->timestamps();
            
        });
        
        Schema::table('users', function (Blueprint $table) {
            $table->integer('transport_id')->unsigned()->after('id');
            $table->foreign('transport_id')->references('id')->on('transports');
            $table->string('cnh', 24)->after('email');
            $table->string('identity_number', 24)->after('cnh');
            $table->string('fone', 24)->after('fone');
        });

        Schema::create('bids', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('cargo_id')->unsigned();
            $table->foreign('cargo_id')->references('id')->on('cargos');

            $table->integer('user_id')->unsigned()->after('id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('driver_id')->unsigned()->after('id');
            $table->foreign('driver_id')->references('id')->on('users');

            $table->enum('bid_status', ['Negociando', 'Negado', 'Aceito', 'Em Andamento', 'Finalizado']);

            $table->string('status');

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
        Schema::dropIfExists('transport_types');
        Schema::dropIfExists('transports');
        Schema::dropIfExists('cargo_types');
        Schema::dropIfExists('cargos');
        Schema::dropIfExists('cargo_transports');
        Schema::dropIfExists('attachments');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('transport_id');
            $table->dropColumn('cnh');
            $table->dropColumn('identity_number');
            $table->dropColumn('fone');
        });
        Schema::dropIfExists('bids');
    }
}
