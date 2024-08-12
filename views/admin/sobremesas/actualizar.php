<main class="mst-actualizar-section">
    <h1>Actualizar Seccion - Sobremesas</h1>
    
    <div class="form">
        
        <div class="mst-btn-voltar-tablas-section">
            <a href="/admin/tables" class="mst-btns">Volver</a>
        </div>

            <?php foreach( $errores as $error ): ?>   <!--  Sirve para aparezca los errores en html -->
                <div class="alert mistake">
                    <?php echo $error ?>
                </div>
            <?php endforeach; ?>

            <form method="POST" enctype="multipart/form-data">  <!-- method POST --> 

                        <?php include __DIR__ . '/formulariosobremesas.php'; ?>

                        <div class="continue-button">
                            <input type="submit" value="Guardar Cambios" class="continue-button">
                        </div>
                            
            </form>
    </div>

</main>
