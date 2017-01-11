<div class="wrap nosubsub">
	<h2>Ganador</h2>
	<?php if ( $dateReal < $dateFin ): ?>
		<div class="notice notice-error">
			<p>Por ahora no es posible enviar un mail de ganador ya que aun no se cumple la fecha limite.</p>
		</div>
	<?php endif; ?>

	<h3>Ranking Participantes</h3>

	<table class="widefat fixed" cellspacing="0">
	    <thead>
		    <tr>
	            <th id="columnname" scope="col">Rank</th>
	            <th id="columnname" scope="col">Nickname</th>
              <th id="columnname" scope="col">Nombre participante</th>
              <th id="columnname" scope="col">Nombre del tutor</th>
              <th id="columnname" scope="col">Email</th>
              <th id="columnname" scope="col">Teléfono</th>
	            <th id="columnname" scope="col">Medallas</th>
	            <th id="columnname" scope="col">Fecha ultima medalla</th>
		    </tr>
	    </thead>

	    <tbody>
	    	<?php if (!empty($participantes_ranking)):
				$count_medallas = wp_count_posts('medallas');
				foreach ($participantes_ranking as $key => $paricipante):
					$user_info = get_userdata($paricipante->participante_id);
          $email = get_user_meta($user_info->ID, '_email_tutor', true);
          $telefono = get_user_meta($user_info->ID, '_telefono_tutor', true);
          $nombre_t = get_user_meta($user_info->ID, '_nombre_tutor', true);
          $apellido_t = get_user_meta($user_info->ID, '_apellido_tutor', true);
          $tutor = $nombre_t.' '.$apellido_t; ?>

					<tr>
			            <th class="column-columnname">Nº <?php echo $paricipante->rank; ?></th>
			            <td class="column-columnname"><?php echo $user_info->user_login; ?></td>
                  <td class="column-columnname"><?php echo $user_info->display_name; ?></td>
                  <td class="column-columnname"><?php echo $tutor; ?></td>
                  <td class="column-columnname"><?php echo $email; ?></td>
                  <td class="column-columnname"><?php echo $telefono; ?></td>
			            <td class="column-columnname"><?php echo $paricipante->numero_de_medallas; ?>/<?php echo $count_medallas->publish; ?></td>
			            <td class="column-columnname"><?php echo $paricipante->fecha_ultima_actualizacion; ?></td>

			        </tr>

				<?php endforeach;
			endif; ?>


	    </tbody>
	</table>


</div>
