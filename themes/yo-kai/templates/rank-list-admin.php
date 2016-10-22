<div class="wrap nosubsub">
	<h2>Ganador</h2>
	<div class="notice notice-error">
		<p>Por ahora no es posible enviar un mail de ganador ya que aun no se cumple la fecha limite.</p>
	</div>

	<h3>Ranking Participantes</h3>
	
	<table class="widefat fixed" cellspacing="0">
	    <thead>
		    <tr>
	            <th id="columnname" scope="col">Rank</th> 
	            <th id="columnname" scope="col">Usuario</th>
	            <th id="columnname" scope="col">Medallas</th>
	            <th id="columnname" scope="col">Fecha ultima medalla</th>
		    </tr>
	    </thead>

	    <tbody>
	    	<?php if (!empty($participantes_ranking)):
				$count_medallas = wp_count_posts('medallas');
				foreach ($participantes_ranking as $key => $paricipante):
					$user_info = get_userdata($paricipante->participante_id); ?>

					<tr>
			            <th class="column-columnname">Nº <?php echo $paricipante->rank; ?></th>
			            <td class="column-columnname"><?php echo $user_info->user_login; ?></td>
			            <td class="column-columnname"><?php echo $paricipante->numero_de_medallas; ?>/<?php echo $count_medallas->publish; ?></td>
			            <td class="column-columnname"><?php echo $paricipante->fecha_ultima_actualizacion; ?></td>

			        </tr>

				<?php endforeach;
			endif; ?>	
	        
	        
	    </tbody>
	</table>

	
</div>