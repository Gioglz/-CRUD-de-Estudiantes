

<?php $__env->startSection('content'); ?>
    <h1 class="text-2xl font-bold mb-4">Lista de Estudiantes</h1>
    <a href="<?php echo e(route('estudiantes.create')); ?>" class="bg-blue-500 text-white px-4 py-2 mb-4 inline-block">Nuevo Estudiante</a>

    <?php if(session('success')): ?>
        <div class="bg-green-200 text-green-800 p-2 mb-4"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table-auto w-full bg-white shadow-md">
        <thead>
            <tr>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Correo</th>
                <th class="px-4 py-2">Carrera</th>
                <th class="px-4 py-2">Semestre</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo e($estudiante->nombre); ?></td>
                    <td class="border px-4 py-2"><?php echo e($estudiante->correo); ?></td>
                    <td class="border px-4 py-2"><?php echo e($estudiante->carrera->nombre); ?></td>
                    <td class="border px-4 py-2"><?php echo e($estudiante->semestre); ?></td>
                    <td class="border px-4 py-2">
                        <a href="<?php echo e(route('estudiantes.edit', $estudiante)); ?>" class="text-blue-500">Editar</a>
                        <form action="<?php echo e(route('estudiantes.destroy', $estudiante)); ?>" method="POST" class="inline">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-red-500 ml-2">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
</html>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Gaby\Desktop\Trabajos WEB\CRUD\Crud-estudiantes\resources\views/home.blade.php ENDPATH**/ ?>