<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Edition de la liste des membres</h3></div>

                <div class="panel-body">
                     <form class="form-horizontal" method="POST" action="<?php echo e(route('editmembre2', '$membres')); ?>">
                        <?php echo e(csrf_field()); ?>


                         <table class="table">
                        <tr>
                            <th>Id utilisateur</th>
                            <th>Nom d'utilisateur</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Adresse e-mail</th>
                            <th>Téléphone</th>
                            <th></th>
                        </tr>

                        <tr>
                            <td><?php echo e($membres->id); ?></td>
                            <td><?php echo e($membres->login); ?></td>
                            <td><?php echo e($membres->nom); ?></td>
                            <td><?php echo e($membres->prenom); ?></td>
                            <td><?php echo e($membres->email); ?></td>
                            <td><?php echo e($membres->tel); ?></td>
                            <?php if(!$membres->admin): ?><td><a href="<?php echo e(route('supprimer', $membres->id)); ?>">Supprimer</a>
                            </td>
                            <?php else: ?>
                            <td></td>
                            <?php endif; ?>
                        </tr>
                    </table>
                    
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>