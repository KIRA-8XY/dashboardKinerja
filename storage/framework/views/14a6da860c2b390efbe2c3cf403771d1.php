<?php $__env->startSection('content'); ?>
<div class="max-w-xl mx-auto">
    <h2 class="text-xl font-bold mb-6 text-gray-800">Tambah Indikator</h2>
    <form action="<?php echo e(route('admin.indikator.store')); ?>" method="POST" class="space-y-4 bg-white rounded-xl shadow p-6">
        <?php echo csrf_field(); ?>
        <div>
            <label class="block mb-1 font-semibold">Pegawai</label>
            <select name="pegawai_id" class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
                <option value="">Pilih Pegawai</option>
                <?php $__currentLoopData = $pegawais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($pegawai->id); ?>"><?php echo e($pegawai->nama); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div>
            <label class="block mb-1 font-semibold">Nama Indikator</label>
            <input type="text" name="nama_indikator" class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
        </div>
        <div class="mb-4">
            <label for="max_score" class="block text-gray-700 text-sm font-bold mb-2">Skor Maksimal</label>
            <input type="number" step="0.01" name="max_score" id="max_score" value="<?php echo e(old('max_score', 5)); ?>"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            <?php $__errorArgs = ['max_score'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="text-red-500 text-xs italic"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div>
            <label class="block mb-1 font-semibold">Target</label>
            <input type="number" name="target" class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
        </div>
        <div>
            <label class="block mb-1 font-semibold">Realisasi</label>
            <input type="number" name="realisasi" class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="px-5 py-2 rounded bg-cyan-600 text-white font-semibold hover:bg-cyan-700 transition">Simpan</button>
            <a href="<?php echo e(route('admin.indikator.index')); ?>" class="px-5 py-2 rounded bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition">Batal</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/dashboardKinerja/resources/views/admin/indikator/create.blade.php ENDPATH**/ ?>