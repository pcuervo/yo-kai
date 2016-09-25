<?php /**
 * CLASE DE PARTICIPANTES
 */

class Medallas{

	private $wpdb;
	private $tableNameConteos;


	public function __construct()
	{
		global $wpdb;
		$this->wpdb = &$wpdb;
		$this->tableNameConteos = $this->wpdb->prefix.'lista_medallas_participantes';

		if($this->wpdb->get_var("SHOW TABLES LIKE '{$this->tableNameConteos}'") != $this->tableNameConteos){
			$this->createTableMedallasParticipante();
		}
	}


	/**
	 * GUARDAR MEDALLA DEL PARTICIPANTE
	 */
	public function save( $args = array() )
	{
		global $cargaMedalla;
		global $idMedalla;
		extract($args);

		$id_exist = $this->checkMedallaExist($nuevaMedallaCompetitor);

		if ($id_exist != '') {
			$this->addMedallaParticipante($id_exist, $nuevaMedallaCompetitor);
			$cargaMedalla = 1;
			$idMedalla = $id_exist;
		}else{
			global $errors;
			$errors = 'El codigo que ingresaste no corresponde a ninguna medalla.';
		}

		// SI EXISTE AGREGAR LA MEDALLA AL PARTICIPANTE

	}

	/**	
	 * CHECA SI EXISTE LA MEDALLA 
	 */
	public function checkMedallaExist($nuevaMedallaCompetitor)
	{
		return $this->wpdb->get_var( $this->wpdb->prepare(
			"SELECT id FROM ".$this->wpdb->prefix."posts 
				WHERE post_title = '%s' AND post_type = 'medallas' AND post_status = 'publish';",
			$nuevaMedallaCompetitor
		));
	}

	/**
	 * AGREGAR LA MEDALLA AL PARTICIPANTE
	 */
	public function addMedallaParticipante($id_exist, $nuevaMedallaCompetitor)
	{
		$current_user = wp_get_current_user();
		$medallas_participante = get_user_meta($current_user->ID, 'medallas', true);
		if ($medallas_participante == '') $medallas_participante = [];

		$medallas_participante[$id_exist]['count'] = isset($medallas_participante[$id_exist]) ? $medallas_participante[$id_exist]['count'] + 1 : 1;
		$medallas_participante[$id_exist]['fecha_ultima_cargada'] = date('Y-m-d');
		$medallas_participante[$id_exist]['codigo'] = 1;

		update_user_meta($current_user->ID, 'medallas', $medallas_participante);
	
		$this->saveTotalMedallasPArticipante($current_user->ID, count($medallas_participante));

	}

	/**
	 * GUARDA LA NUEVA CANTIDAD DE MONEDAS
	 * @param  [type] $nuevaMedallaCompetitor [description]
	 * @return [type]                         [description]
	 */
	private function saveTotalMedallasPArticipante($participante_id, $total)
	{
		$exist = $this->existParticipanteConteo($participante_id);
	
		if ($exist != '') {
			$this->updateParticipanteConteo($participante_id, $total);
		}else{
			$this->storeParticipanteConteo($participante_id, $total);
		}
	}

	/**
	 * CHECA SI EXITE REGISTO DEL PARTICIPANTE EN LA TABLA DE CONTEOS
	 * @param  [type] $participante_id [description]
	 * @return [type]                  [description]
	 */
	private function existParticipanteConteo($participante_id)
	{
		return $this->wpdb->get_var( $this->wpdb->prepare(
			"SELECT id FROM {$this->tableNameConteos} 
				WHERE participante_id = %d;",
			$participante_id
		));
	}

	/**
	 * CREA EL REGISTRO DEL PARTICIPANTE EN LA TABLA DE CONTEOS
	 */
	private function storeParticipanteConteo($participante_id, $total)
	{
		$this->wpdb->insert(
			$this->tableNameConteos,
			array(
				'participante_id'    => $participante_id,
				'numero_de_medallas' => $total
			),
			array(
				'%d',
				'%d'
			)
		);

		return $this->wpdb->insert_id;
	}

	/**	
	 * ACTUALIZA EL TOTAL DE MEDALLAS DEL PARTICIPANTE
	 */
	private function updateParticipanteConteo($participante_id, $total)
	{
		$this->wpdb->update( 
			$this->tableNameConteos, 
			array( 
				'numero_de_medallas' => $total
			), 
			array( 'participante_id' => $participante_id ), 
			array( 
				'%d'
			)
		);

		return true;
	}

	/**	
	 * CREAR TALA PARA LLEVAR EL CONTEO DE LAS MEDALLAS DE LOS PARTICIPANTES
	 */
	private function createTableMedallasParticipante()
	{
		$this->wpdb->query(
			"CREATE TABLE IF NOT EXISTS ".$this->tableNameConteos." (
				id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				participante_id BIGINT(20) NOT NULL,
				numero_de_medallas BIGINT(20) NOT NULL,
				PRIMARY KEY (id),
				KEY participante_id (participante_id)
			) ENGINE=InnoDB AUTO_INCREMENT=1 CHARSET=utf8;"
		);
	}

}