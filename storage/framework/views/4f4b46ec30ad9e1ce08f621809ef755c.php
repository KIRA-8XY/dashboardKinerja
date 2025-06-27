<?php $__env->startSection('content'); ?>
<div class="max-w-5xl mx-auto animate-fade-up">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Indikator</h1>
    <form action="<?php echo e(route('pegawai.indikator.update', $indikator->id)); ?>" method="POST">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
        <div class="mb-4">
            <label>Nama Indikator</label>
            <input type="text" name="nama_indikator" class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400" value="<?php echo e($indikator->nama_indikator); ?>" required>
        </div>
        <div class="mb-4">
            <label>Target</label>
            <input type="number" name="target" class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400" value="<?php echo e($indikator->target); ?>" required>
        </div>
        <div class="mb-4">
            <label>Realisasi</label>
            <input type="number" name="realisasi" class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400" value="<?php echo e($indikator->realisasi); ?>" required>
        </div>
        <button type="submit" class="px-4 py-2 rounded bg-cyan-600 text-white font-semibold hover:bg-cyan-700 transition">Update</button>
        <a href="<?php echo e(route('pegawai.indikator.index')); ?>" class="px-4 py-2 rounded bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition">Batal</a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/dashboardKinerja/resources/views/pegawai/indikator/edit.blade.php ENDPATH**/ ?>