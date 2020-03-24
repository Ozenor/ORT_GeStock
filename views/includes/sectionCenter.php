<div class="col">
    <section class="flex-grow-1 my-3 bg-col-gray px-2">
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <?php
                    foreach ($resultGetCurl->result[0] as $key => $val) {
                    ?>
                        <th><?php echo ucfirst($key) ?></th>
                    <?php
                    }
                    ?>
                    <th>Editer / Supprimer</th>
                </tr>

            </thead>
            <tbody>
                <?php
                foreach ($resultGetCurl->result as $value) {
                ?>
                    <tr>
                        <?php
                        foreach ($value as $val) {
                        ?>
                            <td><?php echo $val ?></td>
                        <?php
                        }
                        ?>
                        <td>
                            <div class="d-flex justify-content-around align-items-center">
                                <a href=""><i class="fas fa-edit"></i></a><a href=""><i class="far fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
</div>