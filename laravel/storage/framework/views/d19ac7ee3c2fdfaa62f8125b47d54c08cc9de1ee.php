<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>File d'attente</h3>
                    <a href="<?php echo e(route('admin')); ?>">
                        <button type="button" class="btn btn-primary fa fa-chevron-left" style="float: left;"> Retour</button>
                    </a>
                </div>

                <div class="panel-body text-center" style="height: 400px; overflow-y: scroll; width: 100%;">

                    <table class="table table-stripped">
                        <thead>
                            <th class="text-center">Rang</th>
                            <th class="text-center">Nom d'utilisateur</th>
                            <th class="text-center">Nom</th>
                            <th class="text-center">Prenom</th>
                            <th class="text-center">Adresse e-mail</th>
                            <th class="text-center">Téléphone</th>
                        </thead>

                        <?php $__currentLoopData = $membres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tbody>
                            <tr>
                                <?php if($membre->rang != null): ?>                            
                                <td ><?php echo e($membre->rang); ?></td>
                                <td ><?php echo e($membre->login); ?></td>
                                <td ><?php echo e($membre->nom); ?></td>
                                <td ><?php echo e($membre->prenom); ?></td>
                                <td ><?php echo e($membre->email); ?></td>
                                <td ><?php echo e($membre->tel); ?></td>
                                <?php endif; ?>
                            </tr>
                        </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-12 text-center">
                    </div>  
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>