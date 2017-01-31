<?php echo $__env->make('admin::common.meta-head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="wrapper">
    <header class="main-header">
        <a href="/<?php echo e(config('cms.uri')); ?>/" class="logo">
            <span class="logo-mini">Lara</span>
            <span class="logo-lg"><b>Lara</b>CMS</span>
        </a>
        <nav class="navbar navbar-static-top">

            <?php if(Auth::user()): ?>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="<?php echo e(route('admin.users.edit', Auth::user()->id)); ?>">
                                <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span>
                            </a>
                        </li>

                        <li class="dropdown user logout">
                            <a href="<?php echo e(url('/'.config('cms.uri').'/logout')); ?>">
                                <span class="hidden-xs">Выйти</span>
                            </a>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
        </nav>
    </header>

    <?php echo $__env->make('admin::common.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <div class="content-wrapper">
        <section class="content-header">
            <?php echo $__env->yieldContent('title'); ?>
            <?php echo $__env->make('admin::common.languages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php $__env->startSection('topmenu'); ?>
                <?php echo $__env->make('admin::common.topmenu.all', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldSection(); ?>

        </section>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </section>
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2016 <a href="http://weltkind.com">Lara CMS</a>.</strong> All rights
        reserved.
    </footer>

    <div class="control-sidebar-bg"></div>
</div>

<?php echo $__env->make('admin::common.meta-footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>