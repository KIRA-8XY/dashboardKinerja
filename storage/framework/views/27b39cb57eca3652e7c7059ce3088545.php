<?php $__env->startSection('content'); ?>
<div class="max-w-xl mx-auto">
    <h2 class="text-xl font-bold mb-6 text-gray-800">Edit Pegawai</h2>
    <form action="<?php echo e(route('admin.pegawai.update', $pegawai->id)); ?>" method="POST" class="space-y-4 bg-white rounded-xl shadow p-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div>
            <label class="block mb-1 font-semibold">Nama</label>
            <input type="text" name="nama"
                class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                value="<?php echo e($pegawai->nama); ?>" required>
        </div>
        <div>
            <label class="block mb-1 font-semibold">Jabatan</label>
            <input type="text" name="jabatan"
                class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                value="<?php echo e($pegawai->jabatan); ?>">
        </div>
        <div>
            <label class="block mb-1 font-semibold">Target</label>
            <input type="number" name="target"
                class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                value="<?php echo e($pegawai->target); ?>">
        </div>
        <div>
            <label class="block mb-1 font-semibold">Realisasi</label>
            <input type="number" name="realisasi"
                class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                value="<?php echo e($pegawai->realisasi); ?>">
        </div>
        <div class="flex gap-2">
            <button type="submit" class="px-5 py-2 rounded bg-cyan-600 text-white font-semibold hover:bg-cyan-700 transition">Update</button>
            <a href="<?php echo e(route('admin.pegawai.index')); ?>" class="px-5 py-2 rounded bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition">Batal</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/dashboardKinerja/resources/views/admin/pegawai/edit.blade.php ENDPATH**/ ?>