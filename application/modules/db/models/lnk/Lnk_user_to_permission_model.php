<?php
class Lnk_user_to_permission_model extends MY_Model{
	public $_table = 'lnk_user_to_permission';
	public $primary_key = 'utp_id';
	public function __construct()
	{
		parent::__construct();
	}

	public function get_user_permissions($userid=''){
		if($userid)
		{
			return $this->db->select('ref_permissions.permission,lnk_user_to_permission.*')
			->join('tbl_documents','lnk_brands_to_images.image_id = tbl_documents.document_id')
			->get_where('lnk_brands_to_images',array("lnk_brands_to_images.brand_id" => $brand_id))->result_array();
		}
	}

	public function get_unique_brand_images($brand_ids='')
	{
		if(!empty($brand_ids) && is_array($brand_ids))
		{
			return $this->db->select('tbl_documents.doc_path,lnk_brands_to_images.image_id,lnk_brands_to_images.brand_id')
			->join('tbl_documents','lnk_brands_to_images.image_id = tbl_documents.document_id')
			->group_by('lnk_brands_to_images.brand_id')
			->where("tbl_documents.is_active",true)
			->where_in("lnk_brands_to_images.brand_id",$brand_ids)
			->get('lnk_brands_to_images')->result();
		}
	}
}