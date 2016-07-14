<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {

	public function userExisted( $username ) {
		$user = M('user');
		$userinfo = $user->where(array('username'=>$username))->select();
		if(!empty($userinfo)) {
			return true;
		}
		return false;	
	}

	public function insert( $data ) {
		$user = M('user');
		if(!$user->add($data)) {
			return false;
		}
		return true;
	}
	

}
