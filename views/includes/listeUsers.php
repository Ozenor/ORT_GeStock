<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-3">
  <div class="text-light d-flex justify-content-between flex-wrap flex-md-nowrap p-2 bg-danger rounded-top">
    <h4>Liste des utilisateurs
    </h4>
  </div>
  <?php // gestion erreur de connexion
  if (!empty($echecConnexion)) {
  ?>
    <div class="alert alert-danger" role="alert">
      <?php echo $echecConnexion; ?>
    </div>
  <?php
  }
  ?>
  <div class="bg-light rounded-bottom mt-4">
    <div class="table-responsive rounded-bottom mb-5">
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <?php
            $flagFirst = true;
            foreach ($resultGetUsers->result[0] as $key => $val) {
              if ($flagFirst) {
            ?>
                <th class="border"><?php echo ucfirst($key) ?></th>
              <?php
              } else {
              ?>
                <th class="border-right"><?php echo ucfirst($key) ?></th>
            <?php
              }
            }
            ?>
            <th>Editer / Supprimer</th>
          </tr>
        </thead>
        <tbody class="border-left">
          <?php
          foreach ($resultGetUsers->result as $value) {
          ?>
            <tr>
              <?php
              foreach ($value as $val) {
              ?>
                <td class="border-right"><?php echo $val ?></td>
              <?php
              }
              ?>
              <td>
                <form method="post" class="form-signin text-center" action="#">
                  <input type="hidden" name="actionSend" value="editUser">
                  <input type="hidden" name="id" value="<?PHP echo $value->id ?>">

                  <button type="submit" class="btn btn-link"><i class="fas fa-edit text-dark"></i></button>
                </form>
                <form method="post" class="form-signin text-center" action="resolve.php">
                  <input type="hidden" name="actionSend" value="deleteUser">
                  <input type="hidden" name="id" value="<?PHP echo $value->id ?>">

                  <button type="submit" class="btn btn-link"><i class="far fa-trash-alt text-dark"></i></button>
                </form>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</main>