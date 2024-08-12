<div class="form-header">   
            <div class="title">
                <h1>Informaciones de nuevos productos - Administración</h1>
            </div>
        </div>
        
        <div class="input-group">
            
            
                <div class="input-box">
                    <label for="imagen">Imagen</label>
                    <input id="imagen" type="file" accept="img/jpeg, img/png" name="seccionPratos[imagen]">
                </div>

                <?php if($seccionPratos->imagen): ?>
                    <img src="../../imagenesPratos/<?php echo $seccionPratos->imagen ?>" class="imagen-actualizar">
                <?php endif; ?>
                
                <div class="input-box">
                    <label for="producto">Producto</label>
                    <input id="producto" type="text" name="seccionPratos[producto]" placeholder="Nombre del producto" value="<?php echo s( $seccionPratos->producto ); ?>"> <!-- required -->
                </div>
                
                <div class="input-box">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="seccionPratos[descripcion]"><?php echo s($seccionPratos->descripcion); ?></textarea>
                </div>
                
                
                <!-- ------------------------------------------------------------------------------------------------- -->
                
                <div class="input-box">
                    <label for="delivery">Delivery</label>
                    <input id="delivery" type="text" name="seccionPratos[delivery]" placeholder="Elegir empresa delivery" value="<?php echo s($seccionPratos->delivery); ?>"> 
                    
                </div>
                
                
                <div class="input-box">
                    <label for="presentacion">Presentación</label>
                    <textarea id="presentacion" name="seccionPratos[presentacion]"><?php echo s($seccionPratos->presentacion); ?></textarea>
                    
                </div>
                
                
                <div class="input-box">
                    <label for="precio">Precio</label>
                    <input id="precio" type="number" name="seccionPratos[precio]" placeholder="Precio Producto" value="<?php echo s( $seccionPratos->precio ); ?>"> 
                    
                </div>
            
            
        </div>