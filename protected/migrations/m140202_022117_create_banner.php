<?php

class m140202_022117_create_banner extends CDbMigration
{
	public function up()
	{
            $this->createTable('banner', array(
               'id'=>'pk',
               'nama'=>'VARCHAR(100) not null',
               'lat'=>'DECIMAL(12, 8) not null',
               'long'=>'DECIMAL(12, 8) not null',
            ));
            $this->insertMultiple('banner', 
                array(
                    array('nama'=>'Test 1','lat'=>'48.8620722','long'=>'2.352047'),
                    array('nama'=>'Test 2','lat'=>'48.8620722','long'=>'2.392047'),
                )
            );
	}

	public function down()
	{
		$this->dropTable('banner');
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