<main class="mst-actualizar-section">
    <h1>Actualizar Seccion - Blog</h1>
    
    <div class="form">

        <div class="mst-btn-voltar-tablas-section">
            <a href="/admin/tables" class="mst-btns">Volver</a>
        </div>

        <?php foreach( $errores as $error ): ?>   <!--  Sirve para aparezca los errores en html -->
            <div class="alert mistake">
                <?php echo $error ?>
            </div>
        <?php endforeach; ?>

            <form method="POST"  enctype="multipart/form-data">  <!-- method POST --> <!-- enctype permite agregar archivos --> 
                
                        <?php include __DIR__ . '/formularioBlog.php'; ?>

                        <div class="continue-button">
                            <input type="submit" value="Actualizar" class="continue-button">
                        </div>
                        
                        
                    </div>
            </form>
    </div>

</main>