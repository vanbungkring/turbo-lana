<?php

class m140509_145050_add_jadwal_banner extends CDbMigration
{
	public function up()
	{
		$this->createTable('banner_jadwal', array(
           'id'=>'pk',
           'idBanner'=>'int',
           'start'=>'date',
           'end'=>'date',
        ));
        $this->createIndex('idBannerIndex','banner_jadwal','idBanner',false);
        $this->createIndex('startIndex','banner_jadwal','start',false);
        $this->createIndex('endIndex','banner_jadwal','end',false);
        $this->createIndex('DateIndex','banner_jadwal','start,end',false);
	}

	public function down()
	{
		$this->dropTable('banner_jadwal');
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