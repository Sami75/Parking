<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Liste des places de parkings réservées</h3>
                    <a href="<?php echo e(route('admin')); ?>">
                        <button type="button" class="btn btn-primary fa fa-chevron-left" style="float: left;"> Retour</button>
                    </a>
                </div>

                <div class="panel-body text-center" style="height: 400px; overflow-y: scroll; width: 100%;">

                    <table class="table table*stripped">
                        <thead>
                            <th class="text-center">Id utilisateur</th>
                            <th class="text-center">Id place</th>
                            <th class="text-center">Début de réservation</th>
                            <th class="text-center">Fin de réservation</th>
                            <th class="text-center">Sélectionner</th>
                        </thead>

                        <?php $__currentLoopData = $membresreserver; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tbody>
                            <tr>
                                <?php if(!$membre->valider): ?>
                                <td ><?php echo e($membre->id); ?></td>
                                <td ><?php echo e($membre->idplace); ?></td>
                                <td ><?php echo e($membre->debutperiode); ?></td>
                                <td ><?php echo e($membre->finperiode); ?></td>
                                <td >
                                    <a href="<?php echo e(route('addplace', $membre->id)); ?>"><button type="button" class="btn btn-primary btn-sm">Sélectionner</button></a>
                                </td>
                                <?php endif; ?>
                            </tr>
                        </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>