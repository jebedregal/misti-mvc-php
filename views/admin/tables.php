<main class="adminitrador">

        <div class="mst-btn-voltar-admin-principal-page">
            <a href="/admin" class="mst-btns">Volver para Administrador</a>
        </div>


        <?php
        if($resultado) {
            $msg = showNotification( intval($resultado) );
            if($msg) { ?>
                <p class="alert success"><?php echo s($msg) ?></p>
           <?php }
           
        } ?>


            <!-- -------------------------------------------------------------------------------------------------------- -->
                        <!-- --------------------------------------------------------------------------- -->
            <!-- -------------------------------------------------------------------------------------------------------- -->

    <div class="mst-table-section-block">
            <h1>Seccion Lanches</h1>

            <div class="mst-btn-crear-registros">
                <a href="/admin/crear-lanches" class="mst-btns">Nuevo anuncio | Lanches</a>
            </div>

            <table class="propiedades form-container">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Descripción</th>
                        <th>Delivery</th>
                        <th>Presetación</th>
                        <th>Precio</th>
                        <th class="actions">Acciones</th>
                    </tr>
                </thead>

                <tbody> <!-- Mostrar Resultados -->
                    <?php foreach( $seccionLanches as $seccionLanches ) : ?>
                    <tr>
                        <td><?php echo $seccionLanches->id; ?></td>
                        <td><img src="../../imagenesLanches/<?php echo $seccionLanches->imagen; ?>" class="table-image"></td>
                        <td><?php echo $seccionLanches->producto; ?></td>
                        <td><?php echo $seccionLanches->descripcion; ?></td>
                        <td><?php echo $seccionLanches->delivery; ?></td>
                        <td><?php echo $seccionLanches->presentacion; ?></td>
                        <td>R$<?php echo $seccionLanches->precio; ?></td>
                        <td>

                        <form method="POST" class=" w-100" action="/admin/eliminar-lanches">

                            <input type="hidden" name="id" value="<?php echo $seccionLanches->id; ?>">
                            <input type="hidden" name="tipo" value="seccionLanches">
                            
                            <div class="mst-btn-eliminar-admin-tables">
                                <input type="submit" class="mst-btns" value="Eliminar">
                            </div>
                        </form>

                            <div class="mst-btn-actualizar-admin-tables">
                                <a href="/admin/actualizar-lanches?id=<?php echo $seccionLanches->id; ?>" class="mst-btns">Actualizar</a>
                            </div>

                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>

    
            <!-- -------------------------------------------------------------------------------------------------------- -->
                        <!-- --------------------------------------------------------------------------- -->
            <!-- -------------------------------------------------------------------------------------------------------- -->


    <div class="mst-table-section-block">
            <h1>Seccion Pratos</h1>

            <div class="mst-btn-crear-registros">
                <a href="/admin/pratos-crear" class="mst-btns">Nuevo anuncio | Pratos</a>
            </div>

            <table class="propiedades form-container">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Descripción</th>
                        <th>Delivery</th>
                        <th>Presetación</th>
                        <th>Precio</th>
                        <th class="actions">Acciones</th>
                    </tr>
                </thead>

                <tbody> <!-- Mostrar Resultados -->
                    <?php foreach( $seccionPratos as $seccionPratos ) : ?>
                    <tr>
                        <td><?php echo $seccionPratos->id; ?></td>
                        <td><img src="../../imagenesPratos/<?php echo $seccionPratos->imagen; ?>" class="table-image"></td>
                        <td><?php echo $seccionPratos->producto; ?></td>
                        <td><?php echo $seccionPratos->descripcion; ?></td>
                        <td><?php echo $seccionPratos->delivery; ?></td>
                        <td><?php echo $seccionPratos->presentacion; ?></td>
                        <td>R$<?php echo $seccionPratos->precio; ?></td>
                        <td>

                        <form method="POST" class=" w-100" action="/admin/pratos-eliminar">

                            <input type="hidden" name="id" value="<?php echo $seccionPratos->id; ?>">
                            <input type="hidden" name="tipo" value="seccionPratos">

                            <div class="mst-btn-eliminar-admin-tables">
                                <input type="submit" class="mst-btns" value="Eliminar">
                            </div>

                        </form>

                            <div class="mst-btn-actualizar-admin-tables">
                                <a href="/admin/pratos-actualizar?id=<?php echo $seccionPratos->id; ?>" class="mst-btns">Actualizar</a>
                            </div>

                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>            
    </div>
            <!-- -------------------------------------------------------------------------------------------------------- -->
                        <!-- --------------------------------------------------------------------------- -->
            <!-- -------------------------------------------------------------------------------------------------------- -->


    <div class="mst-table-section-block">

            <h1>Seccion Sobremesas</h1>

            <div class="mst-btn-crear-registros">
                <a href="/admin/sobremesas-crear" class="mst-btns">Nuevo anuncio | Sobremesas</a>
            </div>

            <table class="propiedades form-container">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Descripción</th>
                        <th>Delivery</th>
                        <th>Presetación</th>
                        <th>Precio</th>
                        <th class="actions">Acciones</th>
                    </tr>
                </thead>

                <tbody> <!-- Mostrar Resultados -->
                    <?php foreach( $seccionSobremesas as $seccionSobremesas ) : ?>
                    <tr>
                        <td><?php echo $seccionSobremesas->id; ?></td>
                        <td><img src="../../imagenesSobremesas/<?php echo $seccionSobremesas->imagen; ?>" class="table-image"></td>
                        <td><?php echo $seccionSobremesas->producto; ?></td>
                        <td><?php echo $seccionSobremesas->descripcion; ?></td>
                        <td><?php echo $seccionSobremesas->delivery; ?></td>
                        <td><?php echo $seccionSobremesas->presentacion; ?></td>
                        <td>R$<?php echo $seccionSobremesas->precio; ?></td>
                        <td>

                        <form method="POST" class=" w-100" action="/admin/sobremesas-eliminar" >

                            <input type="hidden" name="id" value="<?php echo $seccionSobremesas->id; ?>">
                            <input type="hidden" name="tipo" value="seccionSobremesas">

                            <div class="mst-btn-eliminar-admin-tables">
                                <input type="submit" class="mst-btns" value="Eliminar">
                            </div>

                        </form>

                        <div class="mst-btn-actualizar-admin-tables">
                            <a href="/admin/sobremesas-actualizar?id=<?php echo $seccionSobremesas->id; ?>" class="mst-btns">Actualizar</a>
                        </div>

                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

    </div>

            <!-- -------------------------------------------------------------------------------------------------------- -->
                        <!-- --------------------------------------------------------------------------- -->
            <!-- -------------------------------------------------------------------------------------------------------- -->

    <div class="mst-table-section-block">

            <h1>Seccion Blog</h1>

            <div class="mst-btn-crear-registros">
                <a href="/admin/blog-crear" class="mst-btns">Nuevo anuncio | Posts/Blog</a>
            </div>

            <table class="propiedades form-container">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Descripción Completa</th>
                        <th class="actions">Acciones</th>
                    </tr>
                </thead>

                <tbody> <!-- Mostrar Resultados -->
                    <?php foreach( $seccionBlog as $seccionBlog ) : ?>
                    <tr>
                        <td><?php echo $seccionBlog->id; ?></td>
                        <td><img src="../../imagenesBlog/<?php echo $seccionBlog->imagen; ?>" class="table-image"></td>
                        <td><?php echo $seccionBlog->titulo; ?></td>
                        <td><?php echo $seccionBlog->descripcion; ?></td>
                        <td><?php echo $seccionBlog->descripcion_entrada; ?></td>
                        <td>

                        <form method="POST" class=" w-100" action="/admin/blog-eliminar">

                            <input type="hidden" name="id" value="<?php echo $seccionBlog->id; ?>">
                            <input type="hidden" name="tipo" value="seccionBlog">

                            <div class="mst-btn-eliminar-admin-tables">
                                <input type="submit" class="mst-btns" value="Eliminar">
                            </div>

                        </form>

                            <div class="mst-btn-actualizar-admin-tables">
                                <a href="/admin/blog-actualizar?id=<?php echo $seccionBlog->id; ?>" class="mst-btns">Actualizar</a>
                            </div>

                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>


            </table>
    </div>
</main>


