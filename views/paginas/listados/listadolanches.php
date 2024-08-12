<?php foreach( $seccionLanches as $seccionLanches ) : ?>
                <div class="anuncio">
                        
                            <img loading="lazy" src="../../imagenesLanches/<?php echo $seccionLanches->imagen; ?>" alt="anuncio">
                        
                        
                        <div class="contenido-anuncio">             
                                        <h3 class="titulo"><?php echo $seccionLanches->producto; ?></h3>
                                        <p class="descripcion"><?php echo $seccionLanches->descripcion; ?></p>
                                        <p>Apresentação :</p>
                                        <p class="ingredientes"><?php echo $seccionLanches->presentacion; ?></p>
                                        <p>- <?php echo $seccionLanches->delivery; ?></p>
                                        <a href="https://www.instagram.com/mistibonito_br/" class="precio">R$ <?php echo $seccionLanches->precio; ?></a>
                                    </div> 
                                    
                                </div><!-- anuncio  -->
                                
                                
                                
            <?php endforeach; ?>