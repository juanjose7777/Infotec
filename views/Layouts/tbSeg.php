<div class="table-responsive">
    <table class="table table-bordered" id="tb1">
        <thead>
            <tr>
                <th scope="col">Indicador</th>
                <th scope="col">Fecha ejecución</th>
                <th scope="col">Usuario</th>
                <th scope="col">Sentencia Query</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $dt) { ?>
                <tr>
                    <td><?= $dt['idSeguimiento_Bd'] ?></td>
                    <td><?= $dt['SegFechaEje'] ?></td>
                    <td><?= $dt['UsuUser'] ?></td>
                    <td><?= $dt['SegSentencia'] ?></td>
                </tr>
            <?php   } ?>
        </tbody>
    </table>
</div>