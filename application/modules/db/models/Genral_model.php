<?php
class Genral_model extends MY_Model{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_enquires_by_where_in($type='')//Source_id//Interested Program
	{
		/*$input['type']='source_id';
		$input['src']=$posted_data['source'];
		$input['table']='tbl_enquiries';*/
		if(is_array($type) && !empty($type) && isset($type['type']) && !empty($type['src']) && isset($type['table']))
		{
        	return $this->db->select('student_id')
        	->where_in($type['type'],$type['src'])
			->get($type['table'])->result();
		}
	}

	//one of the best cretivity
	public function get_details_by_between_comparision($type='')
	{

		/*input required
		$type['table']="tbl_student_to_taken_exams";
		$type['base_field']="tentative_date";
		$type['heigher_limit']=$posted_data['gre_tentative_to_date'];
		$type['lower_limit']=$posted_data['gre_tentative_from_date'];
		$type['extra_conditions']=array('exam_type_id'=>2);*/
		if(is_array($type) && !empty($type))
		{
			$base_array[$type['base_field'].' <=']=$type['heigher_limit'];
			$base_array[$type['base_field'].' >=']=$type['lower_limit'];
			if(isset($type['extra_conditions']) && !empty($type['extra_conditions']))
			{
				$base_array=array_merge($base_array,$type['extra_conditions']);
			}
			return $this->db->select('student_id')->get_where($type['table'],$base_array)->result();
		}
	}
}