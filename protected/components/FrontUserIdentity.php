<?php
class FrontUserIdentity extends CUserIdentity
{
    private $_id;

    public function setIdUsername($id,$username)
    {
        $this->_id=$id;
        $this->username=$username;
    }
 
    public function authenticate()
    {
        $username=strtolower($this->username);
        $user=Member::model()->find('LOWER(email)=?',array($username));
        if($user===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if(!$user->password == md5($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$user->id;
            $this->username=$user->namaDepan;
            $this->errorCode=self::ERROR_NONE;

            $user->addLog(MemberLog::TYPE_LOGIN,array());
        }
        return $this->errorCode==self::ERROR_NONE;
    }
 
    public function getId()
    {
        return $this->_id;
    }
}