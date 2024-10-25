<div class="row">
    <div class="col-4">
        <h5 class="text-primary">Pantalla 2</h5>
    </div>
    <div class="col-4">
        <center>
            <h2> <?= $data['CiuNombre'] ?></h2>
        </center>
    </div>
    <div class="col-4"></div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="container">
            <center>
                <img class="img-fluid" style="max-height: 400px;" src="/Agencia/asset/img/Ciudad/<?= $data['CiudadFoto'] ?>" alt="">
            </center>
        </div>
    </div>
    <div class="col-lg-4">
        <center>
            <h4>Aventurate a este destino</h4>
        </center>
        <p>
            <?= $data['CiudDes'] ?>
        </p>
    </div>
    <div class="col-lg-4">
        <br><br>
        <center>
            <h4>Cuentanos , cuanto es tu presupuesto?</h4>
        </center>
        <br><br>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">COP $</span>
            <input type="tel" class="form-control" oninput="formatoConComas(this)" id="Presupuesto">
        </div>
        <center>
            <button class="btn btn-primary btn-sm" onclick="InfoDetalle(<?= $data['idCiudad'] ?>)">Siguiente paso</button>
        </center>
    </div>
</div>