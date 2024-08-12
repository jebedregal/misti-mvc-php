<?php foreach($seccionSobremesas as $seccionSobremesas) : ?>
                    <div class="mst-advertisements-block swiper-slide">
                                <a href="https://www.instagram.com/mistibonito_br/">
                                    <div class="mst-advertisement-imagen">
                                        <img loading="lazy" src="../../imagenesSobremesas/<?php echo $seccionSobremesas->imagen; ?>" alt="anuncio">
                                    </div>
                                </a>
                                
                                <div class="mst-content-advertisement">             

                                        <h3><?php echo $seccionSobremesas->producto; ?></h3>
                                        <hr class="mst-hr-products-secction">
                                        <p class="mst-description-desserts"><?php echo $seccionSobremesas->descripcion; ?></p>

                                        <!-- apresentação -->
                                        <p>Apresentação :</p>
                                        <p><?php echo $seccionSobremesas->presentacion; ?></p>
                                        <!-- apresentação -->

                                        <!-- delivery -->
                                        <p><i class="fa-solid fa-motorcycle"></i><?php echo $seccionSobremesas->delivery; ?></p>
                                        <!-- delivery -->

                                        <!-- seccion -->
                                        <p><i class="fa-solid fa-cookie"></i></i>Sobremesas</p>
                                        <!-- seccion -->

                                        <!-- <div class="mst-btn-advertisements-position">
                                        <a href="https://www.instagram.com/mistibonito_br/" class="mst-btns">R$ <?php echo $seccionSobremesas->precio; ?></a>
                                        </div> -->

                                </div> 
                    </div><!-- anuncio  -->
                                    
            <?php endforeach; ?>