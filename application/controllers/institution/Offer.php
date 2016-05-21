<?php
class Group {
	private $id;
	private $nome;

	public function __construct($id, $nome) {
		$this->id = $id;
		$this->nome = $nome;
	}

	public function getId(){
		return $this->id;
	}
	
	public function getNome(){
		return $this->nome;
	}
}

class Area {
	private $id;
	private $nome;
	private $grupos;

	public function __construct($id, $nome) {
		$this->id = $id;
		$this->nome = $nome;
		$this->grupos = Array();
	}

	public function getId(){
		return $this->id;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function getGrupos(){
		return $this->grupos;
	}
	
	public function add($grupo){
		array_push($this->grupos, $grupo);
	}
}

require_once('InstitutionController.php');

class Offer extends InstitutionController {

    /**
     * Offer constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * funcão que controla o adicionar oportunidade, enviando para a view 
     * um array com as ares_grupo existentes para o utilizador(instituiçao) 
     * selecionar.
     */
    //
    public function createOffer() {

        $this->load->model('volunteers/Areas_model', 'areas_model');

        $grupo_area = $this->areas_model->devolveTodosGruposAreas();
		
        $cur_id = 0;
		$cur_area = NULL;

		$arr = Array();

        $areas = Array();
        $grupos = Array();

		foreach($grupo_area as $row) {
				if($row->AreaID != $cur_id && $row->AreaID != "".$cur_id){
					$cur_id = $row->AreaID;
					$area = new Area($row->AreaID, $row->nome);
					$cur_area = $area;
					$area->add(new Group($row->GrupoID, $row->tipo));
					array_push($arr, $area);
                    
				}else{
					$cur_area->add(new Group($row->GrupoID, $row->tipo));
                   
				}
		}
		
		//echo '<p>Area aceder: $arr[0]->getId();</p>';
		//echo '<p>Area nome: $arr[0]->getNome()</p>';
		//echo '<p>Grupo de area aceder: $arr[0]->getGrupos()[0]->getNome()</p>';
	//	print_r($arr);
		$areas_to_view = Array('arr'=>$arr, 'areas');
		

        $this->load->model('institution/Main_model', 'vm');
        $email = $this->session->user_details->email;

        $dadosProfile = $this->vm->getInstitutionByEmail($email);
        //echo "========================<br>";
        //echo var_dump($dadosProfile);
        $dadosMenu = array(
            'titulo' => 'Meu perfil',
            'nome' => $dadosProfile->nome,
            'id' => $dadosProfile->id
        );
        //gerar views
        $this->load->view('institution/menu', $dadosMenu);
        $this->load->view('institution/profile/header', $dadosProfile); 
        $this->load->view('opportunities/addOportunidade', $areas_to_view);
        $this->load->view('common/footer');
        
    }
    
    /**
     * 
     * @return boolean
     */
    public function add_Offer() {
        
        $horario = array(
            'hora_inicio' => $_POST['hora_inicio'],
            'hora_fim' => $_POST['hora_fim'],
            'data_inicio' => $_POST['data_inicio'],
            'data_fim' => $_POST['data_fim']
        );

        $this->load->model('schedule/schedule_model', 'newSch');

        //cria um novo horario
        $insertedID = $this->newSch->create($horario);

        //prepara oportunidade
        $user_id = $this->session->user_id;
       
        $offer = array(
            'instituicao' => $user_id,
            'area' => $_POST['area'],
            'grupo' => $_POST['grupo'.$_POST['area']],
            'freguesia' => $_POST['town'],
            'vagas' => $_POST['vagas'],
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'funcao' => $_POST['funcao'],
            'horario' => $insertedID
        );
		
        $this->load->model('offer/add_offer_model', 'offerModel');

        //cria nova oportunidade
        $offerID = $this->offerModel->add($offer);

        if ($offerID == -1){
            setFlash("danger", "Erro ao inserir oportunidade");
            redirect('institution/offer/createOffer');
        }
        else{
            setFlash("success", "Oportunidade inserida!");
            redirect('institution/my');
        }
    }

}
