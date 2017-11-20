ref_universities
$data['universities_list']=$this->ref_universities->get_universities();


Ref_application_rounds_model
$data['appround_list']=$this->ref_approunds->get_application_rounds();

Ref_program_model
$data['program_list']=$this->ref_program->get_programs();


ref_packages
$data['packages_list']=$this->ref_packages->get_packages();

ref_source
$data['source_list']=$this->ref_source->get_sources();

Tbl_users_model
$data['consultant_list']=$this->users->get_consultants();