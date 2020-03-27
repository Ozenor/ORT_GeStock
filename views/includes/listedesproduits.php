<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-3">
  <div class="text-light d-flex justify-content-between flex-wrap flex-md-nowrap p-2 bg-danger rounded-top">
    <h4>Liste des produits
    </h4>
  </div>

  <div class="bg-light rounded-bottom">
    <div class="dropdown">
      <a class="btn btn-light dropdown-toggle text-dark mt-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        10
      </a>&nbsp;Recherche par page
      <div class="dropdown-menu mt-1" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item text-dark" href="#">20</a>
        <a class="dropdown-item text-dark" href="#">30</a>
        <a class="dropdown-item text-dark" href="#">40</a>
      </div>
      <form class="justify-content-end form-inline mb-1">
        <button class="btn btn-outline-success" type="submit">Search
        </button>
        <input class="form-control" type="search" placeholder="Rechercher" aria-label="Search">
      </form>
    </div>

    <div class="table-responsive rounded-bottom mb-5">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <?php
            $flagFirst = true;
            foreach ($resultGetProducts->result[0] as $key => $val) {
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
          foreach ($resultGetProducts->result as $value) {
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
                <div class="d-flex justify-content-around align-items-center">
                  <a href=""><i class="fas fa-edit text-dark"></i></a><a href=""><i class="far fa-trash-alt text-dark"></i></a>
                </div>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      <a href="#" class="text-dark">Page suivante <i class="fas fa-long-arrow-alt-right"></i></a>
    </div>
  </div>
</main>