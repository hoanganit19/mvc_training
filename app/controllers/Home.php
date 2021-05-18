<?php
class Home extends Controller{

    public $province, $data;

    public function __construct(){
        $this->province = $this->model('HomeModel');
    }

    public function index(){
//        $data = $this->province->getListProvince();
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//
//        $detail = $this->province->getDetailProvince('Hà Nội');
//        echo '<pre>';
//        print_r($detail);
//        echo '</pre>';
        $data = [
            'email' => 'hoangan.web@gmail.com',
            'password' => md5('123456'),
            'phone' => '01234567',
            'fullname' => 'Hoàng An',
            'create_at' => date('Y-m-d H:i:s')
        ];

//        $check = $this->db->table('users')->insert($data);
//        var_dump($check);

//        $id = $this->province->insertUsers($data);
//        echo $id;
//        $data = $this->db->table('province')->get();
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
         //Session::flash('msg', 'Thêm dữ liệu thành công');
//         $msg = Session::flash('msg');
//         echo $msg;

    }

    public function get_user(){
        $this->data['msg'] = Session::flash('msg');
        $this->render('users/add', $this->data);
    }

    public function post_user(){
        $userId = 20;
        $request = new Request();
        if ($request->isPost()){
            /*Set rules*/
            $request->rules([
                'fullname' => 'required|min:5|max:30',
                'email' => 'required|email|min:6|unique:users:email',
                'password' => 'required|min:3',
                'confirm_password' => 'required|match:password',
                'age' => 'required|callback_check_age'
            ]);

            //Set message
            $request->message([
                'fullname.required' => 'Họ tên không được để trống',
                'fullname.min' => 'Họ tên phải lớn hơn 5 ký tự',
                'fullname.max' => 'Họ tên phải nhỏ hơn 30 ký tự',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Định dạng email không hợp lệ',
                'email.min' => 'Email phải lớn hơn 6 ký tự',
                'email.unique' => 'Email đã tồn tại trong hệ thống',
                'password.required' => 'Mật khẩu không được để trống',
                'password.min' => 'Mật khẩu phải lớn hơn 3 ký tự',
                'confirm_password.required' => 'Nhập lại mật khẩu không được để trống',
                'confirm_password.match' => 'Mật khẩu nhập lại không khớp',
                'age.required' => 'Tuổi không được để trống',
                'age.callback_check_age' => 'Tuổi không được nhỏ hơn 20'
            ]);

            $validate = $request->validate();
            if (!$validate){
                Session::flash('msg', 'Đã có lỗi xảy ra. Vui lòng kiểm tra lại');
            }

        }

        $response = new Response();
        $response->redirect('home/get_user');
    }

    public function check_age($age){

        if ($age>=20) return true;
        return false;
    }
}