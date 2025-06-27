<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 space-y-6">
    <div class="flex flex-col gap-6">
        <h1 class="text-2xl font-bold text-gray-800 animate-fade-up" style="animation-delay: 0.1s">Dashboard Admin</h1>

        <!-- Welcome Card -->
        <div class="p-4 rounded-xl bg-gradient-to-r from-cyan-600 to-blue-700 shadow-sm border border-cyan-100 transform transition-all duration-500 hover:scale-[1.01] hover:shadow-md animate-fade-up" style="animation-delay: 0.2s">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-white/20 rounded-lg transition-transform duration-300 hover:scale-110">
                    <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                </div>
                <div class="text-white">
                    <p class="text-sm">Selamat Datang</p>
                    <p class="font-medium"><?php echo e(Auth::user()->name ?? 'Admin'); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
        <!-- Total Pegawai -->
        <div class="p-5 rounded-xl bg-gradient-to-br from-cyan-500 to-blue-600 shadow-md relative overflow-hidden group hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
            <div class="absolute right-0 top-0 w-24 h-24 bg-white/10 rounded-full filter blur-lg -mr-6 -mt-6"></div>
            <div class="relative flex items-center gap-4">
                <div class="p-2.5 bg-white/20 backdrop-blur-sm rounded-lg border border-white/30">
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.9 4.024a9 9 0 01-13.779 13.78z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div>
                    <span class="block text-2xl font-bold text-white"><?php echo e($pegawais->count()); ?></span>
                    <span class="text-white/90 text-sm">Total Pegawai</span>
                </div>
            </div>
        </div>

        <!-- Total Indikator -->
        <div class="p-5 rounded-xl bg-gradient-to-br from-emerald-500 to-green-600 shadow-md relative overflow-hidden group hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
            <div class="absolute right-0 top-0 w-24 h-24 bg-white/10 rounded-full filter blur-lg -mr-6 -mt-6"></div>
            <div class="relative flex items-center gap-4">
                <div class="p-2.5 bg-white/20 backdrop-blur-sm rounded-lg border border-white/30">
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                    </svg>
                </div>
                <div>
                    <span class="block text-2xl font-bold text-white"><?php echo e($pegawais->sum(fn($p) => $p->indikators->count())); ?></span>
                    <span class="text-white/90 text-sm">Total Indikator</span>
                </div>
            </div>
        </div>

        <!-- Total Realisasi -->
        <div class="p-5 rounded-xl bg-gradient-to-br from-amber-500 to-yellow-600 shadow-md relative overflow-hidden group hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
            <div class="absolute right-0 top-0 w-24 h-24 bg-white/10 rounded-full filter blur-lg -mr-6 -mt-6"></div>
            <div class="relative flex items-center gap-4">
                <div class="p-2.5 bg-white/20 backdrop-blur-sm rounded-lg border border-white/30">
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <div>
                    <span class="block text-2xl font-bold text-white"><?php echo e(number_format($pegawais->sum(fn($p) => $p->indikators->sum('realisasi')))); ?></span>
                    <span class="text-white/90 text-sm">Total Realisasi</span>
                </div>
            </div>
        </div>

    </div>
    <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-sm mt-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pegawai</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Indikator</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Realisasi</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Skor</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php $__currentLoopData = $pegawais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-cyan-100 flex items-center justify-center">
                                <svg class="h-6 w-6 text-cyan-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900"><?php echo e($pegawai->nama); ?></div>
                                <div class="text-xs text-gray-400 italic">
                                    <?php echo e($pegawai->jabatan ?? 'Jabatan belum diisi'); ?>

                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?php echo e($pegawai->indikators->count()); ?>

                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?php echo e(number_format($pegawai->indikators->sum('realisasi'))); ?>

                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?php
                            // Calculate max possible score based on indicators' max_scores
                            $max_possible_score = $pegawai->indikators->sum('max_score');
                            $percentage = $max_possible_score > 0 ? ($pegawai->total_score / $max_possible_score) * 100 : 0;
                            
                            if ($percentage >= 100) {
                                $color = 'bg-green-100 text-green-800';
                            } elseif ($percentage >= 80) {
                                $color = 'bg-yellow-100 text-yellow-800';
                            } else {
                                $color = 'bg-red-100 text-red-800';
                            }
                        ?>
                        <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full <?php echo e($color); ?>">
                            <?php echo e(number_format($pegawai->total_score, 2)); ?>

                        </span>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/dashboardKinerja/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>