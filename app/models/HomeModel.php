<?php
/*
 * Kế thừa từ class Model
 *
 * */
class HomeModel extends Model {

    function tableFill(){
       return 'province';
    }

    function fieldFill(){
        return '*';
    }

    function primaryKey(){
        return 'id';
    }

    public function getDetail($id){
        $data = [
            'Item 1',
            'Item 2',
            'Item 3'
        ];
        return $data[$id];
    }

    public function getListProvince(){
        //$data = $this->db->table('province')->whereLike('_name', '%Hà%')->select('_code, _name, id')->limit(3, 2)->orderBy('id', 'DESC')->get();
//        $data = $this->db->table('province')
//            ->join('district', 'province.id=district._province_id')->select('province._name as ten_tinh, district._name as ten_huyen')
//            ->get();

        //return $data;
    }

    public function getDetailProvince($name){
        $data = $this->db->table('province')->where('_name', '=', $name)->first();
        return $data;
    }

    public function insertUsers($data){
        //$this->db->table('users')->delete();
        $this->db->table('users')->insert($data);
        return $this->db->lastId();
    }
}