<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['form_validation']);
		$this->load->model('users_model');
	}

	public function index()
	{
		if(isset($_SESSION['user'])){
            redirect(base_url('index.php/dashboard'));
        }

		if(isset($_POST['login_btn'])){
			$email= $this->input->post('user_email');
			$pw= $this->input->post('user_password');

			$user_data=$this->users_model->authentication($email,$pw);

			if($user_data!==0){

                $user_info = [
                    'user_id'=>$user_data[0]->id,
                    'fullname'=>$user_data[0]->fullname,
                ];

                $this->session->set_userdata('user',$user_info);
                redirect('dashboard');

            }else{

                $this->session->set_flashdata('msg_login','Invalid Password. Please try again.');
            }

        }

        $this->load->view('backend/pages/login');
    }

    public function dashboard ()
    { 
        if(!isset($_SESSION['user'])){

            $this->session->set_flashdata('msg_login','Please Login');
            redirect(base_url('index.php/admin'));
        }


        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/pages/dashboard');
        $this->load->view('backend/include/footer');
    }

    public function logout(){

        $this->session->unset_userdata('user');
        redirect(base_url('index.php/admin'));

    }

    public function add_resident(){

        if(!isset($_SESSION['user'])){
            $this->session->set_flashdata('msg_login','You are not logged in. Please Login First');
            redirect(base_url('index.php/admin'));
        }


        $this->form_validation->set_rules('firstname','First Name','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('middlename','Middle Name','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('lastname','Last Name','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('nameex','Name Extension','trim|min_length[2]|max_length[5]');
        $this->form_validation->set_rules('birth_date','Birth Date','trim|required');
        $this->form_validation->set_rules('birthplace','Birth Place','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('purok','Purok','trim|required|min_length[2]|max_length[10]');
        $this->form_validation->set_rules('barangay','Barangay','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('municipality','Municipality','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('province','Province','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('contact','Contact #','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('sex','Sex','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('civil_status','Civil Status','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('height','Height','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('weight','Weight','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('btype','Blood Type','trim|required|min_length[2]|max_length[5]');
        $this->form_validation->set_rules('nationality','Nationality','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('religion','Religion','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('email','Email','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('educ','Educational Attainment','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('occupation','Occupation','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('monthly','Monthly Income','trim|required|min_length[2]|max_length[1000]');
        $this->form_validation->set_rules('land','Land Ownership Status','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('house','House Ownership','trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_error_delimiters('<p style="color:red;">','<p>');

        if($this->form_validation->run()==FALSE){

            $this->load->view('backend/include/header');
            $this->load->view('backend/include/nav');
            $this->load->view('backend/pages/add_resident');
            $this->load->view('backend/include/footer');

        }else{

            $resident_data = [
                'first_name'=>$this->input->post('firstname',TRUE),
                'middlename'=>$this->input->post('middlename',TRUE),
                'last_name'=>$this->input->post('lastname',TRUE),
                'nameex'=>$this->input->post('nameex',TRUE),
                'birth_date'=>$this->input->post('birth_date',TRUE),
                'birthplace'=>$this->input->post('birthplace',TRUE),
                'purok'=>$this->input->post('purok',TRUE),
                'barangay'=>$this->input->post('barangay',TRUE),
                'municipality'=>$this->input->post('municipality',TRUE),
                'province'=>$this->input->post('province',TRUE),
                'contact'=>$this->input->post('contact',TRUE),
                'sex'=>$this->input->post('sex',TRUE),
                'civil_status'=>$this->input->post('civil_status',TRUE),
                'height'=>$this->input->post('height',TRUE),
                'weight'=>$this->input->post('weight',TRUE),
                'btype'=>$this->input->post('btype',TRUE),
                'nationality'=>$this->input->post('nationality',TRUE),
                'religion'=>$this->input->post('religion',TRUE),
                'email'=>$this->input->post('email',TRUE),
                'educ'=>$this->input->post('educ',TRUE),
                'occupation'=>$this->input->post('occupation',TRUE),
                'monthly'=>$this->input->post('monthly',TRUE),
                'land'=>$this->input->post('land',TRUE),
                'house'=>$this->input->post('house',TRUE),
            ];


            $insert = $this->db->insert('resident',$resident_data);

            $insert_id = $this->db->insert_id();

            if( is_int($insert_id) ){
                redirect(base_url('index.php/dashboard/view-residents'));
            }


        }



    }

    public function view_resident(){

        if(!isset($_SESSION['user'])){
            $this->session->set_flashdata('msg_login','You are not logged in. Please Login First');
            redirect(base_url('index.php/admin'));
        }


        $resident_list = $this->db->get('resident')->result();

        $data = ['resident_list'=>$resident_list];

        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/pages/view_resident',$data);
        $this->load->view('backend/include/footer');
    }
   
	public function delete_resident($resident_id)
	{
        $this->db->db_debug = TRUE;
		$this->db->where('resident_id', $resident_id);
		$this->db->delete('resident');
		redirect(base_url('index.php/dashboard/view-residents'));
	}

	public function update_resident($resident_id)
{
    if (!isset($_SESSION['user'])) {
        $this->session->set_flashdata('msg_login', 'You are not logged in. Please Login First');
        redirect(base_url('index.php/admin'));
    }

    $this->form_validation->set_rules('firstname','First Name','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('middlename','Middle Name','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('lastname','Last Name','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('nameex','Name Extension','trim|min_length[2]|max_length[5]');
    $this->form_validation->set_rules('birth_date','Birth Date','trim|required');
    $this->form_validation->set_rules('birthplace','Birth Place','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('purok','Purok','trim|required|min_length[2]|max_length[10]');
    $this->form_validation->set_rules('barangay','Barangay','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('municipality','Municipality','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('province','Province','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('contact','Contact #','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('sex','Sex','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('civil_status','Civil Status','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('height','Height','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('weight','Weight','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('btype','Blood Type','trim|required|min_length[2]|max_length[5]');
    $this->form_validation->set_rules('nationality','Nationality','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('religion','Religion','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('email','Email','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('educ','Educational Attainment','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('occupation','Occupation','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('monthly','Monthly Income','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('land','Land Ownership Status','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('house','House Ownership','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_error_delimiters('<p style="color:red;">','<p>');

    if ($this->form_validation->run() == FALSE) {
        // Load the resident data based on the resident_id
        $resident_data = $this->db->get_where('resident', array('resident_id' => $resident_id))->row();

        $data = [
            'resident_data' => $resident_data
        ];
        

        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/pages/update_resident', $data);
        $this->load->view('backend/include/footer');
    } else {
        // Update the resident data

    $resident_data = [
        'first_name' => $this->input->post('firstname'),
        'middlename' => $this->input->post('middlename'),
        'last_name' => $this->input->post('lastname'),
        'nameex' => $this->input->post('nameex'),
        'birth_date' => $this->input->post('birth_date'),
        'birthplace' => $this->input->post('birthplace'),
        'purok' => $this->input->post('purok'),
        'barangay' => $this->input->post('barangay'),
        'municipality' => $this->input->post('municipality'),
        'province' => $this->input->post('province'),
        'contact' => $this->input->post('contact'),
        'sex' => $this->input->post('sex'),
        'civil_status' => $this->input->post('civil_status'),
        'height' => $this->input->post('height'),
        'weight' => $this->input->post('weight'),
        'btype' => $this->input->post('btype'),
        'nationality' => $this->input->post('nationality'),
        'religion' => $this->input->post('religion'),
        'email' => $this->input->post('email'),
        'educ' => $this->input->post('educ'),
        'occupation' => $this->input->post('occupation'),
        'monthly' => $this->input->post('monthly'),
        'land' => $this->input->post('land'),
        'house' => $this->input->post('house')
        
    ];

    $this->db->where('resident_id', $resident_id);
    $update = $this->db->update('resident', $resident_data);


    if ($update) {
    redirect(base_url('index.php/dashboard/view-residents'));
}
    }

}
/*End of resident */

public function add_complains(){

    if(!isset($_SESSION['user'])){
        $this->session->set_flashdata('msg_login','You are not logged in. Please Login First');
        redirect(base_url('index.php/admin'));
    }


    $this->form_validation->set_rules('fname','First Name','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('purok','Purok','trim|required|min_length[2]|max_length[10]');
    $this->form_validation->set_rules('barangay','Barangay','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('municipality','Municipality','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('province','Province','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('country','Country','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('nationality','Nationality','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('age','Birth Place','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('sex','Sex','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('contact','Contact #','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('email','Email','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('f_name','First Name','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('m_name','Middle Name','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('l_name','Last Name','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('name_ex','Name Extension','trim|min_length[2]|max_length[5]');
    $this->form_validation->set_rules('prk','Purok','trim|required|min_length[2]|max_length[10]');
    $this->form_validation->set_rules('brgy','Barangay','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('mun','Municipality','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('prov','Province','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('count','Country','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('nation','Nationality','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('ag','Birth Place','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('sx','Sex','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('con','Contact #','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('em','Email','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('act','Action Taken','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('stat','Status','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('loc','Location of Incidence','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_error_delimiters('<p style="color:red;">','<p>');

    if($this->form_validation->run()==FALSE){

     
        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/pages/add_complains');
        $this->load->view('backend/include/footer');

    }else{

        $complains_data = [
            'fname'=>$this->input->post('fname',TRUE),
            'purok'=>$this->input->post('purok',TRUE),
            'barangay'=>$this->input->post('barangay',TRUE),
            'municipality'=>$this->input->post('municipality',TRUE),
            'province'=>$this->input->post('province',TRUE),
            'country'=>$this->input->post('country',TRUE),
            'nationality'=>$this->input->post('nationality',TRUE),
            'age'=>$this->input->post('age',TRUE),
            'sex'=>$this->input->post('sex',TRUE),
            'contact'=>$this->input->post('contact',TRUE),
            'email'=>$this->input->post('email',TRUE),
            'f_name'=>$this->input->post('f_name',TRUE),
            'm_name'=>$this->input->post('m_name',TRUE),
            'l_name'=>$this->input->post('l_name',TRUE),
            'name_ex'=>$this->input->post('name_ex',TRUE),
            'prk'=>$this->input->post('prk',TRUE),
            'brgy'=>$this->input->post('brgy',TRUE),
            'mun'=>$this->input->post('mun',TRUE),
            'prov'=>$this->input->post('prov',TRUE),
            'count'=>$this->input->post('count',TRUE),
            'nation'=>$this->input->post('nation',TRUE),
            'ag'=>$this->input->post('ag',TRUE),
            'sx'=>$this->input->post('sx',TRUE),
            'con'=>$this->input->post('con',TRUE),
            'em'=>$this->input->post('em',TRUE),
            'act'=>$this->input->post('act',TRUE),
            'stat'=>$this->input->post('stat',TRUE),
            'loc'=>$this->input->post('loc',TRUE),

        ];


        $insert = $this->db->insert('complainant_info',$complains_data);

        $insert_id = $this->db->insert_id();

        if( is_int($insert_id) ){
            redirect(base_url('index.php/dashboard/view-complains'));
        }


    }



}

public function view_complains(){

    if(!isset($_SESSION['user'])){
        $this->session->set_flashdata('msg_login','You are not logged in. Please Login First');
        redirect(base_url('index.php/admin'));
    }


    $complains_list = $this->db->get('complainant_info')->result();

    $data = ['complains_list'=>$complains_list];

    $this->load->view('backend/include/header');
    $this->load->view('backend/include/nav');
    $this->load->view('backend/pages/view_complains',$data);
    $this->load->view('backend/include/footer');
}
public function update_complains($complains_id) {
    if (!isset($_SESSION['user'])) {
        $this->session->set_flashdata('msg_login', 'You are not logged in. Please Login First');
        redirect(base_url('index.php/admin'));
    }

    $this->form_validation->set_rules('fname','First Name','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('purok','Purok','trim|required|min_length[2]|max_length[10]');
    $this->form_validation->set_rules('barangay','Barangay','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('municipality','Municipality','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('province','Province','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('country','Country','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('nationality','Nationality','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('age','Birth Place','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('sex','Sex','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('contact','Contact #','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('email','Email','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('f_name','First Name','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('m_name','Middle Name','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('l_name','Last Name','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('name_ex','Name Extension','trim|min_length[2]|max_length[5]');
    $this->form_validation->set_rules('prk','Purok','trim|required|min_length[2]|max_length[10]');
    $this->form_validation->set_rules('brgy','Barangay','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('mun','Municipality','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('prov','Province','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('count','Country','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('nation','Nationality','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('ag','Birth Place','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('sx','Sex','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('con','Contact #','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('em','Email','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('act','Action Taken','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('stat','Status','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_rules('loc','Location of Incidence','trim|required|min_length[2]|max_length[100]');
    $this->form_validation->set_error_delimiters('<p style="color:red;">','<p>');

    if ($this->form_validation->run() == FALSE) {
        // Load the resident data based on the resident_id
        $complains_data = $this->db->get_where('complainant_info', array('complains_id' => $complains_id))->row();

        $data = [
            'complains_data' => $complains_data
        ];
        

        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/pages/update_complains', $data);
        $this->load->view('backend/include/footer');
    } else {
        // Update the resident data
        $complains_data = [
            'fname'=>$this->input->post('fname'),
            'purok'=>$this->input->post('purok'),
            'barangay'=>$this->input->post('barangay'),
            'municipality'=>$this->input->post('municipality'),
            'province'=>$this->input->post('province'),
            'country'=>$this->input->post('country'),
            'nationality'=>$this->input->post('nationality'),
            'age'=>$this->input->post('age'),
            'sex'=>$this->input->post('sex'),
            'contact'=>$this->input->post('contact'),
            'email'=>$this->input->post('email'),
            'f_name'=>$this->input->post('f_name'),
            'm_name'=>$this->input->post('m_name'),
            'l_name'=>$this->input->post('l_name'),
            'name_ex'=>$this->input->post('name_ex'),
            'prk'=>$this->input->post('prk'),
            'brgy'=>$this->input->post('brgy'),
            'mun'=>$this->input->post('mun'),
            'prov'=>$this->input->post('prov'),
            'count'=>$this->input->post('count'),
            'nation'=>$this->input->post('nation'),
            'ag'=>$this->input->post('ag'),
            'sx'=>$this->input->post('sx'),
            'con'=>$this->input->post('con'),
            'em'=>$this->input->post('em'),
            'act'=>$this->input->post('act'),
            'stat'=>$this->input->post('stat'),
            'loc'=>$this->input->post('loc')
            
        ];
        $this->db->where('complains_id', $complains_id);
        $update = $this->db->update('complainant_info', $complains_data);

        if ($update) {
            redirect(base_url('index.php/dashboard/view-complains'));
        }
    }

}

public function addofficials(){
         
    if(!isset($_SESSION['user'])){
        $this->session->set_flashdata('msg_login','You are not logged in. Please Login First');
        redirect(base_url('index.php/admin'));
    }


    $this->form_validation->set_rules('position','Position','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('name','Name','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('contact','Contact','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('address','Address','trim|required');
    $this->form_validation->set_rules('start_term','start term','trim|required');
    $this->form_validation->set_rules('end_term','end term','trim|required');
    $this->form_validation->set_error_delimiters('<p style="color:red;">','<p>');

    if($this->form_validation->run()==FALSE){

        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/pages/addofficials');
        $this->load->view('backend/include/footer');

    }else{

        $officials_data = [
            'position'=>$this->input->post('position',TRUE),
            'name'=>$this->input->post('name',TRUE),
            'contact'=>$this->input->post('contact',TRUE),
            'address'=>$this->input->post('address',TRUE),
            'start_term'=>$this->input->post('start_term',TRUE),
            'end_term'=>$this->input->post('end_term',TRUE),
            
        ];


        $insert = $this->db->insert('addofficials', $officials_data);

        $insert_id = $this->db->insert_id();

        if( is_int($insert_id) ){
            redirect(base_url('index.php/dashboard/view-officials'));
        }


    }
}

public function viewofficials(){

    if(!isset($_SESSION['user'])){
        $this->session->set_flashdata('msg_login','You are not logged in. Please Login First');
        redirect(base_url('index.php/admin'));
    }


    $officials_list = $this->db->get('addofficials')->result();

    $data = ['officials_list'=>$officials_list];

    $this->load->view('backend/include/header');
    $this->load->view('backend/include/nav');
    $this->load->view('backend/pages/viewofficials',$data);
    $this->load->view('backend/include/footer');
}

public function updateofficials($id) {
    if (!isset($_SESSION['user'])) {
        $this->session
        >set_flashdata('msg_login', 'You are not logged in. Please Login First');
        redirect(base_url('index.php/admin'));
    }

    $this->form_validation->set_rules('position','Position','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('name','Name','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('contact','Contact','trim|required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('address','Address','trim|required');
    $this->form_validation->set_rules('start_term','start term','trim|required');
    $this->form_validation->set_rules('end_term','end term','trim|required');
    $this->form_validation->set_error_delimiters('<p style="color:red;">','<p>');

    if ($this->form_validation->run() == FALSE) {
        // Load the resident data based on the resident_id
        $officials_data = $this->db->get_where('addofficials', array('id' => $id))->row();

        $data = [
            'officials_data' => $officials_data
        ];
        

        $this->load->view('backend/include/header');
        $this->load->view('backend/include/nav');
        $this->load->view('backend/pages/updateofficials', $data);
        $this->load->view('backend/include/footer');
    } else {
        // Update the resident data
        $officials_data = [
            'position'=>$this->input->post('position',TRUE),
            'name'=>$this->input->post('name',TRUE),
            'contact'=>$this->input->post('contact',TRUE),
            'address'=>$this->input->post('address',TRUE),
            'start_term'=>$this->input->post('start_term',TRUE),
            'end_term'=>$this->input->post('end_term',TRUE),
    
        ];
        $this->db->where('id', $id);
        $update = $this->db->update('addofficials', $officials_data);

        if ($update) {
            redirect(base_url('index.php/dashboard/view-officials'));
        }
    }

}

public function deleteofficials($id){
    $this->db->db_debug = TRUE;
    $this->db->where('id', $id);
    $this->db->delete('addofficials');
    redirect(base_url('index.php/dashboard/view-officials'));
}

public function delete_complains($complains_id)
{
    $this->db->db_debug= TRUE;
    $this->db->where('complains_id',$complains_id);
    $this->db->delete('complainant_info');
    redirect('dashboard/view-complains');
}

  /* AJAX  */
  public function ajax_update_official_form(){

    $official_id = $this->input->post('official_id',true);

    $officials_data  =  $this->db->where('id',$official_id)->get('addofficials')->row();
    
    $data = ['officials_data'=>$officials_data];

    $this->load->view('backend/pages/popup/edit-official',$data);
}

  /* AJAX  */
  public function ajax_update_complains_form(){

    $complains_id = $this->input->post('complains_id',true);

    $complains_data  =  $this->db->where('complains_id',$complains_id)->get('complainant_info')->row();
    
    $data = ['complains_data'=>$complains_data];

    $this->load->view('backend/pages/popup/update-complains',$data);
}
 /* AJAX  */
 public function ajax_update_resident_form(){

    $resident_id = $this->input->post('resident_id',true);

    $resident_data  =  $this->db->where('resident_id',$resident_id)->get('resident')->row();
    
    $data = ['resident_data'=>$resident_data];

    $this->load->view('backend/pages/popup/update-resident',$data);
}

}



?>