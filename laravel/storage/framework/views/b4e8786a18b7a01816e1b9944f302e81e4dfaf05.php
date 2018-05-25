<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Création de places de parkings</h3>
                    <a href="<?php echo e(route('editplace')); ?>">
                        <button type="button" class="btn btn-primary fa fa-chevron-left" style="float: left;"> Retour</button>
                    </a>
                </div>

                <div class="panel-body text-center" style="height: 400px; overflow-y: scroll; width: 100%;">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('added')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="method" value="PUT">


                        <div class="form-group<?php echo e($errors->has('nbplace') ? ' has-error' : ''); ?>">
                            <label for="nbplace" class="col-md-4 control-label">Nombre de places à ajouter</label>
                                <div class="col-md-6">
                                    <input id="nbplace" type="nbplace" class="form-control" name="nbplace" required>

                                    <?php if($errors->has('nbplace')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('nbplace')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-sm" value="Submit Button">Créer</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>