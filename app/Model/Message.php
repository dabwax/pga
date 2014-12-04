<?php
class Message extends AppModel {
	public $hasOne = array(
		"MessageAuthor",
		"MessageRecipient"
	);
	
	public $hasMany = array(
		"MessageReply"
	);
}