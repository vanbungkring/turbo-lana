<?php

class m140210_144821_banner_kategori extends CDbMigration
{
	public function up()
	{
		$this->createTable('banner_kategori', array(
           'idBanner'=>'int',
           'idKategori'=>'int',        
        ));
        $this->createIndex('idBanerIndex','banner_kategori','idBanner',false);
        $this->createIndex('idKategoriIndex','banner_kategori','idKategori',false);
        $this->createIndex('bannerkategoriIndex','banner_kategori','idBanner,idKategori',true);
	}

	public function down()
	{
		$this->dropTable('banner_kategori');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}