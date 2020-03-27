<section id="Connexion" class="mx-auto border rounded shadow mt-5 mb-5 p-4">
    <form method="post" class="form-signin text-center" action="resolve.php">
        <input type="hidden" name="actionSend" value="addUser">
        <div class="centrer mb-3 mt-1">
            <i class="fas fa-user-plus fa-3x"></i></div>
        <p>Vous souhaitez créer un nouvel utilisateur ? </br>Alors vous êtes au bon endroit.
        </p>
        <?php // gestion erreur de connexion
        if (!empty($echecConnexion)) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $echecConnexion; ?>
            </div>
        <?php
        }
        ?>
        <div>
            <div class="form-group">
                <label for="Inputnom">Nom</label>
                <input type="text" class="form-control" id="Inputnom" placeholder="Nom" name="addNom" required="required">
            </div>
            <div class="form-group">
                <label for="InputPrenom">Prénom</label>
                <input type="text" class="form-control" id="InputPrenom" placeholder="Prenom" name="addPrenom" required="required">
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="InputEmail">Email</label>
                    <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Votre e-mail" name="addEmail" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="InputPassword">Mot de passe</label>
                    <input type="password" class="form-control" id="InputPassword" placeholder="Mot de passe" name="addMdp" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="InputType">Type</label>
                    <select type="email" class="form-control" id="InputType" placeholder="Type" name="addType" required="required">
                        <option value="guest">Guest</option>
                        <option value="admin">Admin</option>
                        <option value="client">Client</option>
                    </select>
                </div>
            </div>
            <button type="submit" value="valider" name="valider" class="btn btn-primary">Envoyer</button>
        </div>
    </form>
</section>