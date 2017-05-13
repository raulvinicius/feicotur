<?php 
    header('Content-type:application/javascript');

    $loop = get_post_by_type('apartamentos', 'ASC');

    $aps = array();

    while ( $loop->have_posts() ) :

        $loop->the_post();

        $nomeAp = get_the_title();;
        $qtdAdultos = get_field( 'capacidade_adultos' );
        $capCriancas = get_field( 'capacidade_criancas' );
        $qtdCasal = get_field( 'quantidade_casal' );
        $qtdSolteiro = get_field( 'quantidade_solteiro' );
        $capCamaExtra = get_field( 'cama_extra' );
        $tarifaInternet = get_field( 'tarifa_internet' );
        $tarifaInternet = split( ',', $tarifaInternet );
        $tarifaBalcao = get_field( 'tarifa_balcao' );
        $tarifaBalcao = split( ',', $tarifaBalcao );

        $tmpAr = array(
            'nome' => $nomeAp, 
            'qtdAdultos' => $qtdAdultos, 
            'capCriancas' => $capCriancas, 
            'qtdCasal' => $qtdCasal, 
            'qtdSolteiro' => $qtdSolteiro, 
            'capCamaExtra' => $capCamaExtra, 
            'tarifaInternet' => $tarifaInternet, 
            'tarifaBalcao' => $tarifaBalcao
        );

        array_push( $aps, $tmpAr);

    endwhile;

/*
    $p = get_page_by_path( 'c-e' );
    $tarifaInternet = get_field( 'tarifa_internet', $p->ID );
    $tarifaInternet = split( ',', $tarifaInternet );
    $tarifaBalcao = get_field( 'tarifa_balcao', $p->ID );
    $tarifaBalcao = split( ',', $tarifaBalcao );
*/

    unset( $tmpAr );

/*
    echo "var apartamentos = new Object();";

            for ($i=0; $i < count($aps); $i++) :
                echo "
                    apartamentos." . $aps[ $i ][ 'nome' ] . " = {'qtdAdultos' : '" . $aps[ $i ]['qtdAdultos'] . "'," .
                        "'capCriancas' : '" . $aps[ $i ]['capCriancas'] . "'," .
                        "'qtdCasal' : '" . $aps[ $i ]['qtdCasal'] . "'," .
                        "'qtdSolteiro' : '" . $aps[ $i ]['qtdSolteiro'] . "'," .
                        "'capCamaExtra' : '" . $aps[ $i ]['capCamaExtra'] . "'," .
                        "'tarifaInternet' : '" . $aps[ $i ]['tarifaInternet'][0] . "," . $aps[ $i ]['tarifaInternet'][1] . "'," .
                        "'tarifaBalcao' : '" . $aps[ $i ]['tarifaBalcao'][0] . "," . $aps[ $i ]['tarifaBalcao'][1] . "'};";
            endfor;
*/
?>

var apartamentos = "<?= $apts ?>";