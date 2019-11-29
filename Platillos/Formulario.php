<div class="row mb-5">
    <div class="col-12 col-md-8">
        <h2>
            <?php echo($platillo->pa_id != 0 ? 'Modificar' : 'Crear'); ?> Platillo
        </h2>
        <span>
            LLena toda la información que se solicita
        </span>
    </div>
    <div class="col-12 col-md-4">
        <div class="btn-group">
            <a href="<?php echo base_url() ?>Platillos/Index" class="btn btn-secondary btn-sm">
                <span class="fas fa-backspace"></span>
                Regresar
            </a>
        </div>
    </div>
</div>
<div class="row">
    <?php
        if(isset($response)):
    ?>  
        <div class="alert alert-danger text-center col-12">
            <?php echo($response['message']); ?>
        </div>
    <?php
        endif;
    ?>
</div>
<div class="row">
    <form method="POST" action="<?php echo(base_url('Platillo/Guardar')); ?>" class="col">
        <div class="form-group row">
            <div class="col-12">
                <label for="platillo" class="">
                    Nombre de platillo
                </label>
            </div>
            <div class="col-12">
                <input type="text" class="form-control" id="platillo" placeholder="Quesadilla" required name="pa_nombre" value="<?php echo($platillo->pa_nombre); ?>" autocomplete="off">
                <input type="hidden" readonly="readonly" name="pa_id"  value="<?php echo($platillo->pa_id); ?>">
                <small class="form-text text-muted">
                    Obligatorio
                </small>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <label for="precio" class="">
                   Precio
                </label>
            </div>
            <div class="col-2">
                <input type="text" class="form-control" id="precio" placeholder="" required name="pa_precio" value="<?php echo($platillo->pa_precio); ?>">
                <small class="form-text text-muted">
                    Obligatorio
                </small>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <label for="comida" class="">
                   Tipo de Comida
                </label>
            </div>
            <div class="col-5">
                <select class="form-control" required name="pa_id_tipo_comida" id="comida" >
                    <option value="">--SELECCIONA--</option>
                    <option value="1">DESAYUNO</option>
                    <option value="2">MERIENDA</option>
                    <option value="3">COLACION</option>
                    <option value="4">COMIDA</option>
                    <option value="5">CENA</option>
                </select>
                <small class="form-text text-muted">
                    Obligatorio
                </small>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <label for="comida" class="">
                   Descripcion
                </label>
            </div>
            <div class="col-12 ">
                <textarea class="form-control"  required name="pa_descripcion" id="descripcion" value="" cols="30" rows="10">
                    <?php echo($platillo->pa_descripcion); ?>
                </textarea>
                <small class="form-text text-muted">
                    Obligatorio
                </small>
            </div>
        </div>
        <div class="form-group row">
            <div class="col">
                <button type="submit" class="btn btn-primary">
                    Guardar
                </button>
            </div>
        </div>
    </form>
    <form method="POST" action="<?php echo(base_url('Platillo/Guardar')); ?>" class="col">
        <div class="form-group row">
            <div class="col-12">
                <label for="platillo" class="">
                    Ingredientes
                </label>
            </div>
            <div class="form-group row">
                <div class="col-5">
                    <select class="form-control" required name="in_nombre" id="ingrediente">

                    </select>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control">
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-outline-primary" id="cantidad" placeholder="cantidad" required name="pi_cantidad" value="">
                        Guardar
                    </button>
                </div>
            </div>
            <div class="row pl-3">
                <table class="table table-bordered col-12">
                    <thead>
                        <tr>
                            <td>Ingrediente</td>
                            <td>Cantidad</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        foreach($registros as $platillo): //here
                    ?>
                        <tr>
                            <td>
                                <?php echo($ingrediente['in_nombre']); ?> 
                            </td>
                            <td class="text-center">
                                
                            </td>
                            <td>
                                </a>
                                    <button href="<?php echo(base_url('Platillos/Formulario/'.$ingrediente['in_nombre'])); ?>" class="btn btn-danger btn-sm btn-eliminar">
                                        <span class="fas fa-trash-alt"></span>
                                    </button>
                            </td>
                        </tr>
                    <?php 
                        endforeach;
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>