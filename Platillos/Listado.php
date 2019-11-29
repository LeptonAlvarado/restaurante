<div class="row mb-5">
    <div class="col-12 col-md-8">
        <h2>
            Listado de tipos de Platillos
        </h2>
        <span>
            Se encontraron <?php echo($totalRegistros); ?> platillos
        </span>
    </div>
    <div class="col-12 col-md-4">
        <div class="btn-group">
            <a href="<?php echo base_url() ?>platillos/formulario" class="btn btn-secondary btn-sm">
                <span class="fas fa-plus-square"></span>
                Nuevo
            </a>
        </div>
    </div>
</div>
<div class="row">
    <?php
        if(isset($response)):
    ?>  
        <div class="alert alert-<?php echo($response['done'] ? 'success' : 'danger') ?> text-center col-12">
            <?php echo($response['message']); ?>
        </div>
    <?php
        endif;
    ?>
    <table class="table table-bordered col-12">
        <thead>
            <tr>
                <td>Platillo</td>
                <td>Precio</td>
                <td>Tipo</td>
                <td>Ingredientes</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($registros as $platillo): //here
            ?>
                <tr>
                    <td>
                        <?php echo($platillo['pa_nombre']); ?> 
                    </td>
                    <td class="text-center">
                        <?php echo($platillo['pa_precio']); ?> 
                    </td>
                    <td class="text-center">
                        <?php echo($platillo['pa_id_tipo_comida']); ?> 
                    </td>   
                    <td class="text-center">
                        <span class="badge badge-<?php echo(($platillo['totalPlatillos'] == 0 ? 'warning' : 'info')); ?>">
                            <?php echo($platillo['totalPlatillos']); ?> 
                        </span>
                    </td>
                    <td class="text-center">
                        <a href="<?php echo(base_url('Platillos/Formulario/'.$platillo['pa_id'])); ?>" class="btn btn-primary btn-sm">
                            <span class="fas fa-pencil-alt"></span>
                        </a>
                            <button href="<?php echo(base_url('Platillos/Eliminar/'.$platillo['pa_id'])); ?>" class="btn btn-danger btn-sm btn-eliminar">
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
<div class="row">
    <div class="col-12">
        <nav aria-label="Page navigation example">
            <?php if(isset($links)): ?>
                <?php echo $links ?>
            <?php endif; ?>
        </nav>
    </div>
</div>