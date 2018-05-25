<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Supprimer la place de parking</h3>
                    <a href="<?php echo e(route('editplace')); ?>">
                        <button type="button" class="btn btn-primary fa fa-chevron-left" style="float: left;"> Retour</button>
                    </a>
                </div>

                <div class="panel-body text-center" style="height: 400px; overflow-y: scroll; width: 100%;">

                        <table class="table table-stripped">
                            <thead>
                                <th class="text-center">Id place</th>
                                <th class="text-center">Numéro de place</th>
                                <th class="text-center">Statut</th>
                                <th class="text-center">Action</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo e($place->idplace); ?></td>
                                    <td><?php echo e($place->numplace); ?></td>
                                    <?php if($place->reserver == 1): ?>
                                        <td><span class="fa fa-lock"></span></td>
                                    <?php else: ?>
                                        <td><span class="fa fa-unlock"></span></td>
                                    <?php endif; ?>
                                    <td>
                                        <a href="<?php echo e(route('deleteplace', $place->idplace)); ?>">
                                            <button type="button" class="btn btn-danger btn-sm">Supprimer</button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>