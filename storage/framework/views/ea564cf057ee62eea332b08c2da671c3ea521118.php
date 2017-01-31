<?php if(!empty($items)): ?>
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <li class="treeview active">
                <a href="">
                    <i class="fa <?php echo e($group['icon']); ?>"></i> <span><?php echo e($group['title']); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <?php if(isset($group['items'])): ?>
                <ul class="treeview-menu">
                    <?php $__currentLoopData = $group['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li><a href="<?=isset($item['route'])?route($item['route']):$item['href']?>"><i class="fa <?php echo e($item['icon']); ?>"></i> <?php echo e($item['title']); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>
                <?php endif; ?>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ul>
    </section>
</aside>
<?php endif; ?>