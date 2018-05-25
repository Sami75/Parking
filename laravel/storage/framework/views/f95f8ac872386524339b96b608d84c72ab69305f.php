<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Réservation</h3>
                    <a href="<?php echo e(route('home')); ?>">
                        <button type="button" class="btn btn-primary fa fa-chevron-left" style="float: left;"> Retour</button>
                    </a>
                </div>

                <div class="panel-body">
            		<div class="panel-body text-center" style="height: 400px; overflow-y: scroll; width: 100%;">
            			<a href="<?php echo e(route('sendplace', $membre->id)); ?>">
                            <button type="button" class="btn btn-primary btn-sm">Réserver</button>
                        </a>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>