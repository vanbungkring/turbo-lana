<?php

class m140222_173518_create_quote extends CDbMigration
{
	public function up()
	{
		$this->createTable('quote', array(
           'id'=>'pk',
           'name'=>'int',
           'initialDate'=>'date',
		   'replyUntil'=>'date',   
		   'duration'=>'int',
		   'durationType'=>'int',
		   'budget'=>'int',
		   'description'=>'text',
		   'otherObservations'=>'text'     
        ));
    }

	public function down()
	{
		$this->dropTable('quote');
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