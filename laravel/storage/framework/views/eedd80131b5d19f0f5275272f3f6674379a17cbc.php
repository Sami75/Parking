<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mot de passe oublié</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('confirmation')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <h3>Nous allons vous envoyer un nouveau mot de passe, entre votre nom d'utilisateur, ainsi que votre adresse email</h3><br/>

                        <div class="form-group<?php echo e($errors->has('login') ? ' has-error' : ''); ?>">
                            <label for="login" class="col-md-4 control-label">Nom d'utilisateur</label>

                            <div class="col-md-6">
                                <input id="login" type="login" class="form-control" name="login" value="<?php echo e(old('login')); ?>" required autofocus>

                                <?php if($errors->has('login')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('login')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">Adresse e-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Envoyer
                                </button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>