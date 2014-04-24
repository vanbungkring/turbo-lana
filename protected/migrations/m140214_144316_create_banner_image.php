<?php

class m140214_144316_create_banner_image extends CDbMigration
{
	public function up()
	{
		$this->createTable('banner_image', array(
           'id'=>'pk',
           'idBanner'=>'int',
           'status'=>'int',        
        ));
        $this->createIndex('idBannerIndex','banner_image','idBanner',false);
        $this->createIndex('idBannerStatusIndex','banner_image','idBanner,status',false);
	}

	public function down()
	{
		$this->dropTable('banner_image');
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