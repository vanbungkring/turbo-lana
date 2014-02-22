<?php

class m140222_100320_create_member_bookmark extends CDbMigration
{
	public function up()
	{
		$this->createTable('member_bookmark', array(
           'id'=>'pk',
           'idMember'=>'int',
           'idBanner'=>'int',
		   'time'=>'datetime',        
        ));
        $this->createIndex('idMemberIndex','member_bookmark','idMember',false);
    }

	public function down()
	{
		$this->dropTable('member_bookmark');
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