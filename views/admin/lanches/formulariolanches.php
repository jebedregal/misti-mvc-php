        
        <div class="form-header">   
            <div class="title">
                <h1>Informaciones de nuevos productos - Administración</h1>
            </div>
        </div>
        
        <div class="input-group">
            
            
                <div class="input-box">
                    <label for="imagen">Imagen</label>
                    <input id="imagen" type="file" accept="img/jpeg, img/png" name="seccionLanches[imagen]">
                </div>

                <?php if($seccionLanches->imagen): ?>
                    <img src="../../imagenesLanches/<?php echo $seccionLanches->imagen ?>" class="imagen-actualizar">
                <?php endif; ?>
                
                <div class="input-box">
                    <label for="producto">Producto</label>
                    <input id="producto" type="text" name="seccionLanches[producto]" placeholder="Nombre del producto" value="<?php echo s( $seccionLanches->producto ); ?>"> <!-- required -->
                </div>
                
                <div class="input-box">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="seccionLanches[descripcion]"><?php echo s($seccionLanches->descripcion); ?></textarea>
                </div>
                
                
                <!-- ------------------------------------------------------------------------------------------------- -->
                
                <div class="input-box">
                    <label for="delivery">Delivery</label>
                    <input id="delivery" type="text" name="seccionLanches[delivery]" placeholder="Elegir empresa delivery" value="<?php echo s($seccionLanches->delivery); ?>"> 
                    
                </div>
                
                
                <div class="input-box">
                    <label for="presentacion">Presentación</label>
                    <textarea id="presentacion" name="seccionLanches[presentacion]"><?php echo s($seccionLanches->presentacion); ?></textarea>
                    
                </div>
                
                
                <div class="input-box">
                    <label for="precio">Precio</label>
                    <input id="precio" type="number" name="seccionLanches[precio]" placeholder="Precio Producto" value="<?php echo s( $seccionLanches->precio ); ?>"> 
                    
                </div>
            
            
        </div>