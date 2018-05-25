<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Espace Administrateur</div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    Vous êtes connecté(e) !

                    <ul id="nav">

                        <li><a href="editmembre" title="Editer la liste des membres">Editer les Membres</a></li>
                        <li><a href="editrangmembre" title="Editer la liste d'attente, reinitialiser le mot de passe d'un membre">Editer la liste d'attente</a></li>
                        <li><a href="editplace" title="Editer la liste des places">Places</a></li>
                        <li><a href="rangmembre" title="Consulter la liste d'attente">Liste d'attente</a></li>
                        <li><a href="historiqueplace" title="Consulter la liste d'attribution des places">Historique</a></li>
                        <li><a href="attribplace" title="Attribuer des places">Attribuer une place</a></li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>