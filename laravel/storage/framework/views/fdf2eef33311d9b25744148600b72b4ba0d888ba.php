<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Espace Utilisateur</h3>
                </div>

                <div class="panel-body" style="height: 400px; overflow-y: scroll; width: 100%;">
                    <?php if($membrevalider): ?>
                    <div id="list-group">

                        <a href="historique" class="list-group-item" title="Historique de vos places">Historique <i class="fa fa-chevron-right" style="float: right; font-size: 24px"></i></a>
                        <a href="<?php echo e(route('reserverplace')); ?>" class="list-group-item" title="Demande de réservation d'une place">Réservation <i class="fa fa-chevron-right" style="float: right; font-size: 24px"></i></a>
                        <a href="profilemembre" class="list-group-item" title="Consulter son profil">Mon compte <i class="fa fa-chevron-right" style="float: right; font-size: 24px"></i></a>

                    </div><br/>
                    <?php else: ?>
                        <p class="lead">Votre compte est en cours de validation, vous pourrez accéder au menu, lorsque l'administrateur vous aura validé</p>
                    <?php endif; ?>
                    <?php if(($rang == null) && ($numplacemembre == '---') && ($membrevalider)): ?>
                        <p class="lead"> Veuillez réserver une place de parking si vous souhaitez obtenir une place, si des places sont disponibles votre numéro de place parking vous sera attribué, aprés que l'administrateur vous communiquera les période de réservation, sinon vous serez placé en file d'attente</p>
                    <?php elseif(($numplacemembre == '---') && ($membrevalider)): ?>
                        <p class="lead">Il n'y a plus de place de parking libre !</p>
                        <p class="lead">Rang dans la file d'attente : <?php echo e($rang); ?></p>
                    <?php elseif(!$datecompare && ($membrevalider)): ?>
                        <p class="lead">Votre réservation de place est arrivé à écheance, veuillez renouveller votre réservation</p>
                    <?php elseif($validation): ?>
                        <p class="lead">Votre place de parking : <?php echo e($numplacemembre); ?></p>
                        <p class="lead">Début de réservation : <?php echo e($debutperiode); ?></p>
                        <p class="lead">Fin de réservation : <?php echo e($finperiode); ?></p>
                    <?php elseif(!$validation && ($membrevalider)): ?>
                        <p class="lead">L'administrateur n'a pas valider votre réservation, il est entrain de vous attribuer des dates de réservation, veuillez patientez</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>