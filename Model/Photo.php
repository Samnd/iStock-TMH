<?php
class Photo extends AppModel{

	public $belongsTo = 'User';
	public $hasMany = 'Comment';

	var $primaryKey = 'idphoto';
	public $validate = array(
		'name' => array('rule'=>'notBlank'),
		'file'=>array('rule'=>'file')
		);

	public function isOwnedBy($photo, $user) {
   		return $this->field('idphoto', array('idphoto' => $photo, 'user_id' => $user)) !== false;
	}

		// paginate and paginateCount implemented on a behavior.
	public function paginate($conditions, $fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) {
	    // method content
	    $recursive = -1;
	    $this->useTable = false;
        $sql = '';
        $sql.= 'select \'Photo\' as \'table\', idphoto as id, url_image as url, type, des, created, user_id '.
				'from photos ';
		if (isset($conditions['type'])) {
			$sql.= ' where '.'type = \''.$conditions['type'].'\'';
		}
		$sql.=	'union all '.
				'select \'Video\', id, url_video as url, type, des, created, user_id '.
				'from videos ';
		if (isset($conditions['type'])) {
			$sql.= ' where '.'type = \''.$conditions['type'].'\'';
		}
		$sql.= ' order by created desc '.
				'LIMIT '.(($page-1)*$limit).', '.$limit;
		$results = $this->query($sql);
        return $results;
	}

	public function paginateCount($conditions = null, $recursive = 0,$extra = array()) {
	    // method body
	    $sql = '';
        $sql.= 'select \'Photo\' as tab, url_image as name, type, des, created, user_id '.
				'from photos '.
				'union all '.
				'select \'Video\', url_video as name, type, des, created, user_id '.
				'from videos ';
		if (isset($conditions['type'])) {
			
			$sql.= ' where '.'type = \''.$conditions['type'].'\'';
		}
		$sql.=	'order by created desc ';
        $this->recursive = $recursive;
        $results = $this->query($sql);
        return count($results);
	}
}
?>