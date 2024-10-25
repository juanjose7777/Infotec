<div class="table-responsive">
    <table class="table" id="tb1">
        <thead>
            <tr>
                <th scope="col">Pais</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Presupuesto COP</th>
                <th scope="col">Presupuesto Local</th>
                <th scope="col">Presupuesto Aleman</th>
                <th scope="col">Compartido</th>
                <th scope="col">OPT</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $dt) { ?>
                <tr>
                    <td><?= $dt['PaisNombre'] ?></td>
                    <td><?= $dt['CiuNombre'] ?></td>
                    <td>$<?= number_format($dt['PreValorLocal'], 0) ?></td>
                    <td><?= $dt['PaisSimMon'] ?> <?= number_format($dt['PreValorPaisSelect'], 2) ?></td>
                    <td>€<?= number_format($dt['PreValorAlem'], 2) ?></td>
                    <td class="text-center"><?= $dt['Contar'] ?> Veces</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#comp-<?= $dt['idPresupuesto'] ?>">Compartir</button>
                        </div>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="comp-<?= $dt['idPresupuesto'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Comparte tu Presupuesto</h1>
                            </div>
                            <div class="modal-body">
                                <label for="" class="label-form">Selecciona el Usuario</label> <br>
                                <select class="form-select" aria-label="Default select example" style="width: 100%;" id="CompUser<?= $dt['idPresupuesto'] ?>">
                                    <option selected></option>
                                    <?php foreach ($LisUser as $Lu) { ?>
                                        <option value="<?= $Lu['idUsuarios'] ?>"><?= $Lu['UsuNombres'] . " " .  $Lu['UsuApellidos'] ?> </option>
                                    <?php   } ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" onclick="CompartirPre(<?= $dt['idPresupuesto'] ?>,<?= $idUsuarios ?>)">Compartir</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php  } ?>

        </tbody>
    </table>
</div>