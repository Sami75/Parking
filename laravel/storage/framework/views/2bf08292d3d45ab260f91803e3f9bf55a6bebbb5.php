<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Edition de mon mot de passe</h3>
                    <a href="<?php echo e(route('profilemembre')); ?>">
                        <button type="button" class="btn btn-primary fa fa-chevron-left" style="float: left;"> Retour</button>
                    </a>
                </div>

                <div class="panel-body text-center" style="height: 400px; overflow-y: scroll; width: 100%;">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('updatepwdmembre')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="method" value="PUT">

                        <table class="table table-stripped">
                            <thead>
                                <th>Nom d'utilisateur</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Adresse e-mail</th>
                            </thead>

                            <tbody>
                                    <td><?php echo e(Auth::User()->login); ?></td>
                                    <td><?php echo e(Auth::User()->nom); ?></td>
                                    <td><?php echo e(Auth::User()->prenom); ?></td>
                                    <td><?php echo e(Auth::User()->email); ?></td>
                                    <td>
                            </tbody>
                        </table> 
                       <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>" autocomplete="off">
                            <label for="password" class="col-md-4 control-label">Nouveau mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmer le nouveau mot de passe</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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