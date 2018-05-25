<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Attribution de la place</h3>
                    <a href="<?php echo e(route('ajoutplace')); ?>">
                        <button type="button" class="btn btn-primary fa fa-chevron-left" style="float: left;"> Retour</button>
                    </a>
                </div>

                <div class="panel-body text-center" style="height: 400px; overflow-y: scroll; width: 100%;">

                    <form class="form-horizontal" method="POST" action="<?php echo e(route('updateplace', $membre->id)); ?>">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="method" value="PUT">
                    <table class="table table-stripped">
                        <thead>
                            <th class="text-center">Id utilisateur</th>
                            <th class="text-center">Login</th>
                            <th class="text-center">Nom</th>
                            <th class="text-center">Prénom</th>
                            <th class="text-center">Adresse e-mail</th>
                            <th class="text-center">Téléphone</th>
                            <th class="text-center">Numéros de place</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td ><?php echo e($membre->id); ?></td>
                                <td ><?php echo e($membre->login); ?></td>
                                <td ><?php echo e($membre->nom); ?></td>
                                <td ><?php echo e($membre->prenom); ?></td>
                                <td ><?php echo e($membre->email); ?></td>
                                <td ><?php echo e($membre->tel); ?></td>
                                <td ><?php echo e($numplace->numplace); ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="form-group<?php echo e($errors->has('debutperiode') ? ' has-error' : ''); ?>">
                        <label for="debutperiode" class="col-md-4 control-label">Début de réservation</label>
                        <div class="col-md-6">
                            <input id="debutperiode" type="text" class="form-control" name="debutperiode" placeholder="<?php echo e($reservation->debutperiode); ?>" required autofocus>

                            <?php if($errors->has('debutperiode')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('debutperiode')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('finperiode') ? ' has-error' : ''); ?>">
                        <label for="finperiode" class="col-md-4 control-label">Fin de réservation</label>
                        <div class="col-md-6">
                            <input id="finperiode" type="text" class="form-control" name="finperiode" placeholder="<?php echo e($reservation->finperiode); ?>" required autofocus>

                            <?php if($errors->has('finperiode')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('finperiode')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-sm" value="Submit Button">Valider</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>