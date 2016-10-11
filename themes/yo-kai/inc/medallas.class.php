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
			$errors = 'El código que ingresaste no corresponde a ninguna medalla.';
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

		if ( date('Y-m-d H:i:s') < '2017-01-05 14:00:00' ) {
			$this->saveTotalMedallasPArticipante($current_user->ID, count($medallas_participante));
		}


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
				'numero_de_medallas' => $total,
				'fecha_ultima_actualizacion' => date('Y-m-d h:i:s')
			),
			array(
				'%d',
				'%d',
				'%s'
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
				'numero_de_medallas' => $total,
				'fecha_ultima_actualizacion' => date('Y-m-d h:i:s')
			),
			array( 'participante_id' => $participante_id ),
			array(
				'%d',
				'%s'
			)
		);

		return true;
	}

	/**
	 * REGRESA EL TOTAL DE MEDALLAS DEL PARTICIPANTE
	 * @param  [type] $participanteId [description]
	 * @return [type]                 [description]
	 */
	static function getTotalMedallasParticipanteTabla($participante_id)
	{
		global $wpdb;
		return $wpdb->get_var( $wpdb->prepare(
			"SELECT numero_de_medallas FROM {$wpdb->prefix}lista_medallas_participantes
				WHERE participante_id = %d;",
			$participante_id
		));
	}

	/**
	 * RANKING DEL PARTICIPANTE
	 */
	static function getRankingParticipanteId($participante_id){
		global $wpdb;
		return $wpdb->get_var( $wpdb->prepare(
			"SELECT FIND_IN_SET( numero_de_medallas, (
			SELECT GROUP_CONCAT( numero_de_medallas
			ORDER BY numero_de_medallas DESC )
			FROM {$wpdb->prefix}lista_medallas_participantes )
			) AS rank
			FROM {$wpdb->prefix}lista_medallas_participantes
			WHERE participante_id = %d
			ORDER BY numero_de_medallas DESC",
			$participante_id
		));

	}

	/**
	 * CREAR TALA PARA LLEVAR EL CONTEO DE LAS MEDALLAS DE LOS PARTICIPANTES
	 */
	static function createTableMedallasParticipante()
	{
		global $wpdb;
		$wpdb->query(
			"CREATE TABLE IF NOT EXISTS {$wpdb->prefix}lista_medallas_participantes (
				id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				participante_id BIGINT(20) NOT NULL,
				numero_de_medallas BIGINT(20) NOT NULL,
				fecha_ultima_actualizacion datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
				PRIMARY KEY (id),
				KEY participante_id (participante_id)
			) ENGINE=InnoDB AUTO_INCREMENT=1 CHARSET=utf8;"
		);
	}

	static function ranking(){
		global $wpdb;
		return $wpdb->get_results( "SELECT participante_id, fecha_ultima_actualizacion, numero_de_medallas, FIND_IN_SET( numero_de_medallas, (
			SELECT GROUP_CONCAT( numero_de_medallas
			ORDER BY numero_de_medallas DESC )
			FROM {$wpdb->prefix}lista_medallas_participantes )
			) AS rank
			FROM {$wpdb->prefix}lista_medallas_participantes
			ORDER BY numero_de_medallas DESC", OBJECT
		 );
	}
}