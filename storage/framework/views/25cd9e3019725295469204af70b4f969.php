<?php $__env->startSection('content'); ?>
<div class="max-w-5xl mx-auto animate-fade-up">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Riwayat Kinerja</h1>
    <div class="mb-6">
        <a href="<?php echo e(route('pegawai.riwayat-kinerja.create')); ?>" class="bg-cyan-600 hover:bg-cyan-700 text-white font-semibold py-2 px-4 rounded">+ Tambah Riwayat</a>
    </div>
    <div class="card-wrapper overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-left">
        <thead>
            <tr class="hover:bg-gray-50">
                <th class="px-4 py-2 text-xs font-medium text-gray-500 uppercase">No</th>
                <th class="px-4 py-2 text-xs font-medium text-gray-500 uppercase">Nama Indikator</th>
                <th class="px-4 py-2 text-xs font-medium text-gray-500 uppercase">Target</th>
                <th class="px-4 py-2 text-xs font-medium text-gray-500 uppercase">Realisasi</th>
                <th class="px-4 py-2 text-xs font-medium text-gray-500 uppercase">Bulan</th>
                <th class="px-4 py-2 text-xs font-medium text-gray-500 uppercase">Tahun</th>
                <th class="px-4 py-2 text-xs font-medium text-gray-500 uppercase text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-100">
            <?php $__currentLoopData = $riwayats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $riwayat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-3"><?php echo e($i+1); ?></td>
                <td class="px-6 py-3"><?php echo e($riwayat->nama_indikator); ?></td>
                <td class="px-6 py-3"><?php echo e(number_format($riwayat->target)); ?></td>
                <td class="px-6 py-3"><?php echo e(number_format($riwayat->realisasi)); ?></td>
                <td class="px-6 py-3"><?php echo e($riwayat->bulan); ?></td>
                <td class="px-6 py-3"><?php echo e($riwayat->tahun); ?></td>
                <td class="px-6 py-3 text-center">
                    <a href="<?php echo e(route('pegawai.riwayat-kinerja.edit', $riwayat->id)); ?>" class="btn btn-warning mr-2">Edit</a>
                    <form action="<?php echo e(route('pegawai.riwayat-kinerja.destroy', $riwayat->id)); ?>" method="POST" class="inline delete-form">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
            </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/dashboardKinerja/resources/views/pegawai/riwayat-kinerja/index.blade.php ENDPATH**/ ?>