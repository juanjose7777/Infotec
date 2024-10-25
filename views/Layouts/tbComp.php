<div class="table-responsive">
    <table class="table" id="tb2">
        <thead>
            <tr>
                <th scope="col">Dueño Presupuesto</th>
                <th scope="col">Pais</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Presupuesto COP</th>
                <th scope="col">Presupuesto Local</th>
                <th scope="col">Presupuesto Aleman</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $dt) { ?>
                <tr>
                    <td><?= $dt['UsuNombres'] . " " .  $dt['UsuApellidos'] ?></td>
                    <td><?= $dt['PaisNombre'] ?></td>
                    <td><?= $dt['CiuNombre'] ?></td>
                    <td>$<?= number_format($dt['PreValorLocal'], 0) ?></td>
                    <td><?= number_format($dt['PreValorPaisSelect'], 2) ?></td>
                    <td>€<?= number_format($dt['PreValorAlem'], 2) ?></td>
                </tr>
            <?php    } ?>

        </tbody>
    </table>
</div>