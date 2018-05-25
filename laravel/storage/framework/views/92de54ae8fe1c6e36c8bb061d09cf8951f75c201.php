<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Edition du rang</h3>
                    <a href="<?php echo e(route('selection', $membres->id)); ?>">
                        <button type="button" class="btn btn-primary fa fa-chevron-left" style="float: left;"> Retour</button>
                    </a>
                </div>

                <div class="panel-body text-center" style="height: 400px; overflow-y: scroll; width: 100%;">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('updaterang', $membres->id)); ?>">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="method" value="PUT">

                        <table class="table table-stripped">
                            <thead>
                                <th class="text-center">Id utilisateur</th>
                                <th class="text-center">Nom d'utilisateur</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Prenom</th>
                                <th class="text-center">Adresse e-mail</th>
                            </thead>

                            <tbody>
                                <?php if(!$membres->admin): ?>
                                    <td><?php echo e($membres->id); ?></td>
                                    <td><?php echo e($membres->login); ?></td>
                                    <td><?php echo e($membres->nom); ?></td>
                                    <td><?php echo e($membres->prenom); ?></td>
                                    <td><?php echo e($membres->email); ?></td>
                                    <td>
                                <?php else: ?>
                                    <td></td>
                                    <td></td>
                                <?php endif; ?>
                            </tbody>
                        </table> 

                       <div class="form-group<?php echo e($errors->has('rang') ? ' has-error' : ''); ?>">
                            <label for="rang" class="col-md-4 control-label">Rang dans la file d'attente</label>

                            <div class="col-md-6">
                                <input id="rang" type="rang" class="form-control" name="rang" value="<?php echo e($membres->rang); ?>" required>

                                <?php if($errors->has('rang')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('rang')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning btn-sm" value="Submit Button">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>