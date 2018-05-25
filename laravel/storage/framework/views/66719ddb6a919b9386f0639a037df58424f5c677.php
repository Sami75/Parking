<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Edition de la liste d'attente ou le mot de passe d'un utilisateur</h3></div>

                <div class="panel-body">

                    <table class="table">
                        <tr>
                            <th>Id utilisateur</th>
                            <th>Nom d'utilisateur</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Adresse e-mail</th>
                            <th>Téléphone</th>
                           	<th>Rang</th>
                            <th></th>
                        </tr>
                        
                        <?php $__currentLoopData = $membres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($membre->id); ?></td>
                            <td><?php echo e($membre->login); ?></td>
                            <td><?php echo e($membre->nom); ?></td>
                            <td><?php echo e($membre->prenom); ?></td>
                            <td><?php echo e($membre->email); ?></td>
                            <td><?php echo e($membre->tel); ?></td>
                            <td><?php echo e($membre->rang); ?></td>
                            <?php if(!$membre->admin): ?><td><a href="<?php echo e(route('selection', $membre->id)); ?>">Editer</a>
                            </td>
                            <?php else: ?>
                            <td></td>
                            <?php endif; ?>
                            <td></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>