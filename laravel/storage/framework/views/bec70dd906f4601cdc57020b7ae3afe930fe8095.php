<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Edition de membres</h3>
                    <a href="<?php echo e(route('editmembre')); ?>">
                        <button type="button" class="btn btn-primary fa fa-chevron-left" style="float: left;"> Retour</button>
                    </a>
                </div>

                <div class="panel-body text-center" style="height: 400px; overflow-y: scroll; width: 100%;">
                        <table class="table table-stripped">
                            <thead>
                                <th class="text-center">Id utilisateur</th>
                                <th class="text-center">Nom d'utilisateur</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Prenom</th>
                                <th class="text-center">Adresse e-mail</th>
                                <th class="text-center">Rang</th>
                                <th class="text-center">Action</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php if(!$membres->admin): ?>
                                        <td><?php echo e($membres->id); ?></td>
                                        <td><?php echo e($membres->login); ?></td>
                                        <td><?php echo e($membres->nom); ?></td>
                                        <td><?php echo e($membres->prenom); ?></td>
                                        <td><?php echo e($membres->email); ?></td>
                                        <td><?php echo e($membres->rang); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('supprimer', $membres->id)); ?>">
                                                <button type="button" class="btn btn-danger btn-sm">Supprimer</button>
                                            </a>
                                        </td>
                                    <?php else: ?>
                                        <td></td>
                                        <td></td>
                                    <?php endif; ?>
                                </tr>
                            </tbody>
                        </table>
                        <a href="<?php echo e(route('editpwd', $membres->id)); ?>">
                            <button type="button" class="btn btn-warning btn-sm" style="float: center;">Modifier le mot de passe</button>
                        </a>
                        <a href="<?php echo e(route('editrang', $membres->id)); ?>">
                            <button type="button" class="btn btn-warning btn-sm" style="float: center;">Modifier le rang</button>
                        </a>
                    </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>