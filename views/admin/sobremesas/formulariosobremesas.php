<div class="form-header">   
            <div class="title">
                <h1>Informaciones de nuevos productos - Administración</h1>
            </div>
        </div>
        
        <div class="input-group">
            
            
                <div class="input-box">
                    <label for="imagen">Imagen</label>
                    <input id="imagen" type="file" accept="img/jpeg, img/png" name="seccionSobremesas[imagen]">
                </div>

                <?php if($seccionSobremesas->imagen): ?>
                    <img src="../../imagenesSobremesas/<?php echo $seccionSobremesas->imagen ?>" class="imagen-actualizar">
                <?php endif; ?>
                
                <div class="input-box">
                    <label for="producto">Producto</label>
                    <input id="producto" type="text" name="seccionSobremesas[producto]" placeholder="Nombre del producto" value="<?php echo s( $seccionSobremesas->producto ); ?>"> <!-- required -->
                </div>
                
                <div class="input-box">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="seccionSobremesas[descripcion]"><?php echo s($seccionSobremesas->descripcion); ?></textarea>
                </div>
                
                
                <!-- ------------------------------------------------------------------------------------------------- -->
                
                <div class="input-box">
                    <label for="delivery">Delivery</label>
                    <input id="delivery" type="text" name="seccionSobremesas[delivery]" placeholder="Elegir empresa delivery" value="<?php echo s($seccionSobremesas->delivery); ?>"> 
                    
                </div>
                
                
                <div class="input-box">
                    <label for="presentacion">Presentación</label>
                    <textarea id="presentacion" name="seccionSobremesas[presentacion]"><?php echo s($seccionSobremesas->presentacion); ?></textarea>
                    
                </div>
                
                
                <div class="input-box">
                    <label for="precio">Precio</label>
                    <input id="precio" type="number" name="seccionSobremesas[precio]" placeholder="Precio Producto" value="<?php echo s( $seccionSobremesas->precio ); ?>"> 
                    
                </div>
            
            
        </div>