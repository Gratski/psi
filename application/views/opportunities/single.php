<div class="container">

    <div class="row">
        <div class="col-sm-8">

            <div class= "SectionTitle">

                <!-- OFFER TITLE -->
                <h2> <?php echo $offer->titulo; ?> </h2>

            </div>

            <!-- DESCRIPTION -->
            <div class="well col-md-12">
                <!-- POSITION -->
                <p><?php echo $offer->funcao; ?><p>

                <!-- DECRIPTION ITSELF -->
                <p><?php echo $offer->descricao; ?></p>
                
                <!-- Offer details -->
                <table class="table" style="font-size:13px;">
                    <tr>
                        <td><b>Nº de vagas</b></td>
                        <td><?php echo $offer->vagas; ?></td>
                    </tr>
                    <tr>
                        <td><b>Local</b></td>
                        <td><?php echo $offer->pais .", ". $offer->distrito. ", ". $offer->concelho . ", ". $offer->freguesia; ?></td>
                    </tr>
                    <tr>
                        <td><b>Horário:</b></td>
                        <td><?php echo "DAS ".$offer->hora_inicio."h00 às ".$offer->hora_fim."h00"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Periodo:</b></td>
                        <td><?php echo "De: " . $offer->data_inicio . ", Até: " . $offer->data_fim; ?></td>
                    </tr>
                </table>

            </div>

            <!-- ADDRESS COMPONENTS -->
            <div class="col-md-12">
            </div>


            <!-- PUBLISHED BY -->
            <div class="col-md-12">
                Publicado por:&nbsp;<?php echo $offer->instituicao; ?>
            </div>

            <!-- END -->

        </div>

        <!-- OPORTUNIDADES QUE FAZEM MATCH EXCLUINDO ESTA -->
        <div class="col-sm-4">

            <!-- LIST ITEM -->
            <div class="col-md-12">

                

            </div>

        </div>
