<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Historique des réservations</h3>
                    <a href="<?php echo e(route('admin')); ?>">
                        <button type="button" class="btn btn-primary fa fa-chevron-left" style="float: left;"> Retour</button>
                    </a>
                </div>

                <div class="panel-body text-center" style="height: 400px; overflow-y: scroll; width: 100%;">

                    <table class="table table-stripped">
                    	<thead>
                            <th class="text-center">Numéro de place</th>
                            <th class="text-center">Début de réservation</th>
   	                        <th class="text-center">Fin de réservation</th>
   	                        <th class="text-center">Réservation Valider</th>
   	                    </thead>
                        <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tbody>
                            <tr>
                                	<td> <?php echo e($reservation->idplace); ?> </td>
                                	<td> <?php echo e($reservation->debutperiode); ?> </td>
                                	<td> <?php echo e($reservation->finperiode); ?> </td>
                                <?php if($reservation->valider == 1): ?>
                                   	<td><span class="fa fa-check"></span></td>

                                <?php else: ?>
                                    <td><span class="fa fa-remove"></span></td>
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