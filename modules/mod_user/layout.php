
<div class="login-form">
    <h2>Se connecter</h2>
    <form method="POST" action="<?php echo BASE_URL.'/user/login' ?>">
        <fieldset>
            <div class="clearfix">
                <input type="text" name="login" placeholder="login">
            </div>
            <div class="clearfix">
                <input type="password" name="password" placeholder="Mot de passe">
            </div>
            <button class="btn primary" type="submit">Sign in</button>
        </fieldset>
    </form>
</div>