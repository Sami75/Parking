<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<h3>Liste des membres</h3>
                	<?php if($nbValider > 0): ?>
                    	<a href="<?php echo e(route('validermembre')); ?>">
                    		<button type="button" class="btn btn-primary active" style="float: right;">Nouveau(x) compte(s) <span class="badge badge-danger"><?php echo e($nbValider); ?></span></button>
                    	</a>           
                    <?php else: ?>
                    	<a href="<?php echo e(route('validermembre')); ?>">
                    		<button type="button" class="btn btn-primary disabled " style="float: right;">Nouveau(x) compte(s) <span class="badge badge-danger"><?php echo e($nbValider); ?></span></button>
                    	</a>
                    <?php endif; ?>
                    <a href="<?php echo e(route('admin')); ?>">
                    	<button type="button" class="btn btn-primary fa fa-chevron-left" style="float: left;"> Retour</button>
                    </a>
                </div>

                <div class="panel-body text-center" style="height: 400px; overflow-y: scroll; width: 100%;">

                    <table class="table table-stripped">
                    	<thead>
	                            <th class="text-center">Id utilisateur</th>
	                            <th class="text-center">Nom d'utilisateur</th>
	                            <th class="text-center">Nom</th>
	                            <th class="text-center">Prenom</th>
	                            <th class="text-center">Adresse e-mail</th>
	                            <th class="text-center">Téléphone</th>
	                            <th class="text-center">Rang</th>
	                            <th class="text-center">Sélectionner</th>
	                    </thead>
	                    <?php $__currentLoopData = $membres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                        <tbody>
								<td><?php echo e($membre->id); ?></td>
		                   	    <td><?php echo e($membre->login); ?></td>
		                        <td><?php echo e($membre->nom); ?></td>
		           	            <td><?php echo e($membre->prenom); ?></td>
		                        <td><?php echo e($membre->email); ?></td>
		                        <td><?php echo e($membre->tel); ?></td>
		                        <td><?php echo e($membre->rang); ?></td>
	                            <?php if(!$membre->admin): ?>
	                            	<td>
		                            	<a href="<?php echo e(route('selection', $membre->id)); ?>">
		                            		<button type="button" class="btn btn-primary btn-sm">Sélectionner</button>
		                            	</a>
		                        	</td>
		                        <?php else: ?>
		                        	<td></td>
		                        <?php endif; ?>    
		                    </tbody>
	                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>