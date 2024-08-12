        
        <div class="form-header">   
            <div class="title">
                <h1>Informaciones de nuevos articulos - Administración</h1>
            </div>
        </div>
        
        <div class="input-group">
            
            
                <div class="input-box">
                    <label for="imagen">Imagen</label>
                    <input id="imagen" type="file" accept="img/jpeg, img/png" name="seccionBlog[imagen]">
                </div>

                <?php if($seccionBlog->imagen): ?>
                    <img src="../../imagenesBlog/<?php echo $seccionBlog->imagen ?>" class="imagen-actualizar">
                <?php endif; ?>
                
                <div class="input-box">
                    <label for="titulo">Titulo</label>
                    <input id="titulo" type="text" name="seccionBlog[titulo]" placeholder="Titulo del articulo" value="<?php echo s( $seccionBlog->titulo ); ?>"> <!-- required -->
                </div>
                
                <div class="input-box">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="seccionBlog[descripcion]"><?php echo s($seccionBlog->descripcion); ?></textarea>
                </div>
                
                <div class="input-box">
                    <label for="descripcion_entrada">Descripción Larga</label>
                    <textarea id="descripcion_entrada" name="seccionBlog[descripcion_entrada]"><?php echo s($seccionBlog->descripcion_entrada); ?></textarea>
                </div>
            
            
        </div>