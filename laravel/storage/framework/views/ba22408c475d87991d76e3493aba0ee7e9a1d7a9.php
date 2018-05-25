<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Espace Utilisateur</div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    Vous êtes connecté(e) !

                    <ul id="nav">

                        <li><a href="historique" title="Historique de vos place">Historique</a></li>
                        <li><a href="reserver" title="Demande de réservation">Réservation</a></li>
                        <li><a href="modifierpwd" title="Modifier son mot de passe">Modifier le mot de passe</a></li>

                    </ul>

 
                    <?php if(Auth::user()->rang): ?>
                    <?php echo e("Votre place dans la file d'attente d'attribution d'une place : "); ?> <?php echo e(Auth::user()->rang); ?>

                    <?php else: ?>
                    <?php echo e("Votre numéro de place de parking : "); ?> <?php echo e(Auth::user()->rang); ?>

                    <?php endif; ?>


                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>