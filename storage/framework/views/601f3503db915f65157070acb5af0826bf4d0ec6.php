<ul>
	<?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li><a href="<?php echo e($menu['href']); ?>"><?php echo e($menu['text']); ?></a>
			<?php if(@$menu['children']): ?>
				<ul>
					<?php $__currentLoopData = $menu['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><a href="<?php echo e($sub['href']); ?>"><?php echo e($sub['text']); ?></a>
							<?php if(@$sub['children']): ?>
								<ul>
									<?php $__currentLoopData = $sub['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li><a href="<?php echo e($nes['href']); ?>"><?php echo e($nes['text']); ?></a></li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
							<?php endif; ?>
						</li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			<?php endif; ?>
		</li>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>