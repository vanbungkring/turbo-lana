<?php

class m140307_142803_add_setting_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('setting', array(
           'id'=>'pk',
           'active'=>'int',
           'judul'=>'text',
           'logo'=>'text',
           'alamat'=>'text',
           'noTelp'=>'varchar(200)',
           'email'=>'varchar(100)',
           'website'=>'varchar(200)'   
        ));
        $this->insert('setting',array(
        	'active'=>1,
        	'judul'=>'KIVIADS – Your Outdoor Advertising Partner',
        	'logo'=>null,
        	'alamat'=>'Gedung Medco Ampera Lantai 3, Jalan Ampera Raya 18-20, Jakarta Selatan 12560',
        	'noTelp'=>'021 71292973',
        	'email'=>'admin@gmail.com',
        	'website'=>'test.com',
        ));
    }

	public function down()
	{
		$this->dropTable('setting');
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