<?php
class Page {
	protected $_ci;
	function __construct()
	{
		$this->_ci =&get_instance();
	}
        function insertcss($csspath) {
            if ( is_array($csspath)){
                $datacss='';
                foreach ($csspath as $value) {
                    $datacss       .="\t<link href='".base_url().$value."' rel='stylesheet'>\n";
                }
            } else {
                $datacss            ='<link href="'.base_url().$csspath.'" rel="stylesheet">';
            }
            return $datacss;
        }
        function insertcontent($view, $data) {
            if ( is_array($view)){
                $datacontent='';
                foreach ($view as $value) {
                    $datacontent   .=$this->_ci->load->view($value   ,$data, true);
                }
            } else {
                $datacontent        =$this->_ci->load->view($view    ,$data, true);
            }
            return $datacontent;
        }
        function insertjs($jspath) {
            if ( is_array($jspath)){
                $datajs='';
                foreach ($jspath as $value) {
                    $datajs        .="\t<script src='".base_url().$value."'></script>\n";
                }
            } else {
                $datajs             ='<script src="'.base_url().$jspath.'"></script>';
            }
            return $datajs;
        }
        function insertscript($linescript) {
            $datascript             ="<script>\n";
            $datascript            .="\t\t$(document).ready(function() {\n";
            if ( is_array($linescript)){
                foreach ($linescript as $value) {
                    $datascript    .="\t\t\t".$value."\n";
                }
            } else {
                $datascript        .="\t\t\t".$linescript."\n";
            }
            $datascript            .="\t\t});\n";
            $datascript            .="\t</script>\n";
            return $datascript;
        }
        
	function view($view,$data=null)
	{
            if (isset($view['css'])) {
                $data['css']        =  $this->insertcss($view['css']);
            } else {
                $data['css']        ="\n";
            }
            if (isset($view['topnav'])) {
                $data['topnav']     =$this->_ci->load->view($view['topnav'] ,$data, true);
            } else {
                $data['topnav']     ="\n";
            }
            if (isset($view['sidenav'])) {
                $data['sidenav']    =$this->_ci->load->view($view['sidenav'],$data, true);
            } else {
                $data['sidenav']    ="\n";
            }
            if (isset($view['js'])) {
                $data['js']         =  $this->insertjs($view['js']);
            } else {
                $data['js']         ="\n";
            }
            if(isset($view['script'])){
                $data['script']     =$this->insertscript($view['script']);
            }else{
                $data['script']     ="\n";
            }
//            if (isset($data['table'])) {
//                $data['js']        .=$this->_ci->load->view('datatables'    ,$data, true);
//            } else {
//                $data['table']='';
//            }
            if (isset($view['content'])) {
                $data['content']    =$this->insertcontent($view['content']  ,$data);
            } else {
                $data['content']    ="\n";
            }
            $this->_ci->load->view('pagelayout.php',$data);
	}
}
