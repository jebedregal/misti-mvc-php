<?php foreach($seccionPratos as $seccionPratos) : ?>
                    <div class="anuncio">
                        
                            <img loading="lazy" src="../../imagenesPratos/<?php echo $seccionPratos->imagen; ?>" alt="anuncio">
                        
                        
                        <div class="contenido-anuncio">             
                                <h3 class="titulo"><?php echo $seccionPratos->producto; ?></h3>
                                <p class="descripcion"><?php echo $seccionPratos->descripcion; ?></p>
                                <p>Apresentação :</p>
                                <p class="ingredientes"><?php echo $seccionPratos->presentacion; ?></p>
                                <p>- <?php echo $seccionPratos->delivery; ?></p>
                                <a href="https://www.instagram.com/mistibonito_br/" class="precio">R$ <?php echo $seccionPratos->precio; ?></a>
                        </div> 
                                    
                    </div><!-- anuncio  -->
                                    
            <?php endforeach; ?>