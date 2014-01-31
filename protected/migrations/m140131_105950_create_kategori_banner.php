<?php

class m140131_105950_create_kategori_banner extends CDbMigration
{
	public function up()
	{
            $this->createTable('kategori_banner', array(
               'id'=>'pk',
               'nama'=>'VARCHAR(100) not null',
               'keterangan'=>'text',
            ));
            $this->insertMultiple('kategori_banner', 
                array(
                    array('nama'=>'Alternative'),
                    array('nama'=>'Billboard'),
                    array('nama'=>'Digital Network (DOOH)'),
                    array('nama'=>'Indoor/Place Based'),
                    array('nama'=>'Station & Port'),
                    array('nama'=>'Street Furniture'),
                    array('nama'=>'Transit & Mobile'),
                )
            );
	}

	public function down()
	{
            $this->dropTable('kategori_banner');
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