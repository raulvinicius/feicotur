<?php get_header(); ?>



<section class="fotos pagina">

	<section class="feicotur-head container-fluid">

		<h2>Foto <span class="color-y bold">2017</span></h2>

		<!-- Generator: Adobe Illustrator 19.2.1, SVG Export Plug-In  -->
		<svg class="recorte" version="1.1"
			 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
			 x="0px" y="0px" width="100%" height="190" style="enable-background:new 0 0 1921 100%;"
			 xml:space="preserve">
			 <defs>
			   <pattern id='image-head' width="1" height="1" preserveAspectRatio="none">
			     <image xlink:href='<?php bloginfo('template_url') ?>/img/feicotur-bg-head-bot.jpg' x="0" y="0" width="100%" height="531" preserveAspectRatio="xMidYMin slice"></image>
			   </pattern>
			 </defs>
			<g>
				<path fill="url(#image-head)" d="M189,0L0,189V0H190z"/>
			</g>
		</svg>

		<span id="enfeite-centro"></span>

	</section>
	<div class="row merito-title-pagina">
	    <div class="container">
	        <h2 class="merito-title">Fotos</h2>

	        <?php 
	            $ano = get_query_var('category_name');

	            $arEdicoes = get_terms('tag-edicoes', array(
	                        'order'         => DESC,
	                        'post_type'     => array('fotos'),
	                    )
	                );

	        ?>

	        <select id="select-edicao" class="ani-04 bg-cor-1 bg-cor-2-hover" name="ano" data-p="fotos" <?php echo ( $ano != '' ) ? 'data-s="' . $ano . '"' : ''; ?> <?php echo ( count( $arEdicoes ) <= 1 ) ? 'disabled' : ''; ?>>
	            <?php 
	                for ($i=0; $i < count( $arEdicoes ); $i++) :
	                    ?>
	                    
	                    <option value="<?php echo $arEdicoes[$i]->name ?>" <?php echo ( ( $ano != '' && $ano == $arEdicoes[$i]->name ) || $i == 0 ) ? 'selected' : ''; ?>><?php echo $arEdicoes[$i]->name ?></option>

	                    <?php 
	                endfor;

	                if ( $ano != '' ) 
	                {
	                    $ano = get_term_by('slug', $ano, 'tag-edicoes')->term_id;
	                }
	                else
	                {
	                    $ano = $arEdicoes[0]->term_id;
	                }

	            ?>

	        </select>
	    </div>
	</div>

	<div class="container">
	<div class="row">
	    <ul>


	        <?php 


	        $extraArgs = array(
	            'tax_query' => array(
	                array(
	                    'taxonomy'  => 'tag-edicoes',
	                    'field'     => 'slug',
	                    'terms'     => get_term_by('id', $ano, 'tag-edicoes')->name,
	                ),
	            ),
	        );

	        $fotos = get_post_by_type('fotos', $extraArgs);

	        while ( $fotos->have_posts() ) :
	            $fotos->the_post();

	            $galeria = get_field('foto');
	            
	            for ($i=0; $i < count( $galeria ); $i++) :
	                ?>


	                <li class="col-sm-2">
	                    <a href="javascript:void(0)" data-img="<?php echo $galeria[$i]['sizes']['large'] ?>" data-i="<?php echo $i; ?>"> 
	                        <figure><img src="<?php echo $galeria[$i]['sizes']['foto-galeria'] ?>" nopin="nopin"/></figure>
	                    </a>
	                </li>
	            

	                <?php 
	            endfor;
	        endwhile;

	        ?>

	        <div class="clearfix"></div>

	    </ul>

	    <div class="foto-full container-fluid">
	        <div class="row">
	            
	            <button id="close"></button>

	            <button id="left" class="ani-04"></button>
	            
	            <div class="wrap-img">
	                <span id="helper"></span>
	                <img src="" data-i="-1"/>
	            </div>
	            <button id="right" class="ani-04"></button>

	        </div>
	    </div>
	    
	    
	</div>
	</div>


</section>



<?php get_footer(); ?>