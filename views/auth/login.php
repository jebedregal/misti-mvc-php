<main id="section-main" class="mst-page-main-block">
    <section class="mst-section-login-accounts">
            <?php foreach($errores as $error) : ?>

            <div class="alert mistake">
                <?php echo $error; ?>
            </div>

            <?php endforeach; ?>
            <form class="mst-form-accounts" method="POST" action="/admin/login">
        
                    <div class="mst-box-camp">
                        <label for="email"></label>
                        <input type="email" id="email" placeholder="E-mail" name="email">
                    </div>
        
                    <div class="mst-box-camp">
                        <label for="password"></label>
                        <input type="password" id="password" placeholder="Password" name="password">
                    </div>
        
                    <div class="section-btn-login-account">
                        <input type="submit" class="mst-btn-login-accounts" value="Iniciar Sessão">
                    </div>

            </form>
    </section>
</main>