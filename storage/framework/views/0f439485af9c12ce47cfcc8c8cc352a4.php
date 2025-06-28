<?php $__env->startSection('title', 'Dashboard Pegawai'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-5xl mx-auto animate-fade-up">
    <h1 class="text-2xl font-bold mb-12 text-gray-900">Dashboard Pegawai</h1>
    <div class="mb-12">
        <div class="flex items-start gap-4">
            <div>
                <p class="text-3xl text-gray-600 mb-1">Halo,</p>
                <p class="text-4xl font-bold text-gray-900"><?php echo e($pegawai->nama); ?></p>
            </div>
        </div>
    </div>
    <?php
    $active_indikators = $indikators->where('target', '>', 0);
    $total_achievement_percentage = $active_indikators->sum(fn($i) => ($i->realisasi / $i->target) * 100);
    $average_achievement_percentage = count($active_indikators) > 0 ? $total_achievement_percentage / count($active_indikators) : 0;

    $green_kpis = $indikators->filter(fn($i) => $i->kpi_score['warna'] == 'bg-success')->count();
    $yellow_kpis = $indikators->filter(fn($i) => $i->kpi_score['warna'] == 'bg-warning')->count();
    $red_kpis = $indikators->filter(fn($i) => $i->kpi_score['warna'] == 'bg-danger')->count();

    $max_possible_score = $indikators->sum('max_score');
    $overall_performance_percentage = $max_possible_score > 0 ? ($total_score / $max_possible_score) * 100 : 0;

    if ($overall_performance_percentage >= 90) {
        $score_color = 'text-green-800';
    } elseif ($overall_performance_percentage >= 70) {
        $score_color = 'text-yellow-800';
    } else {
        $score_color = 'text-red-800';
    }
    ?>
    <!-- First Row: Main Summary Cards -->
    <div class="flex justify-center mb-6">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 w-full max-w-4xl">
            <!-- Total Indikator -->
            <div class="p-4 rounded-xl text-white shadow-lg bg-gradient-to-br from-cyan-500 to-sky-600 flex items-center justify-between min-h-[100px] transform transition-transform hover:scale-105">
                <div>
                    <span class="text-2xl font-bold"><?php echo e($indikators->count()); ?></span>
                    <p class="text-sm font-medium">Total Indikator</p>
                </div>
                <div class="opacity-30">
                    <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                    </svg>
                </div>
            </div>
            <!-- Overall Performance -->
            <div class="p-4 rounded-xl text-white shadow-lg bg-gradient-to-br from-amber-400 to-yellow-500 flex items-center justify-between min-h-[100px] transform transition-transform hover:scale-105">
                <div>
                    <span class="text-2xl font-bold"><?php echo e(number_format($overall_performance_percentage, 1)); ?>%</span>
                    <p class="text-sm font-medium">Kinerja Keseluruhan</p>
                </div>
                <div class="opacity-30">
                    <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
            </div>
            <!-- Average Achievement -->
            <div class="p-4 rounded-xl text-white shadow-lg bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-between min-h-[100px] transform transition-transform hover:scale-105">
                <div>
                    <span class="text-2xl font-bold"><?php echo e(number_format($average_achievement_percentage, 1)); ?>%</span>
                    <p class="text-sm font-medium">Rata-Rata Pencapaian Indikator</p>
                </div>
                <div class="opacity-30">
                    <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Second Row: Detailed Stats -->
    <div class="flex justify-center mb-6">
        <div class="flex flex-wrap gap-6 w-full max-w-4xl">
            <!-- Total Skor -->
            <div class="flex-1 min-w-[150px] bg-white rounded-xl shadow-lg p-4 flex flex-col items-center justify-center transform transition-transform hover:scale-105">
                <h3 class="text-md font-semibold text-gray-500">Total Skor</h3>
                <p class="text-3xl font-bold <?php echo e($score_color); ?>"><?php echo e(number_format($total_score, 2)); ?></p>
            </div>
            <!-- Hijau -->
            <div class="flex-1 min-w-[150px] bg-white rounded-xl shadow-lg p-4 flex flex-col items-center justify-center transform transition-transform hover:scale-105">
                <div class="w-6 h-6 rounded-full bg-green-500 mb-1"></div>
                <div class="text-md font-semibold text-green-800">Hijau</div>
                <div class="text-xl font-bold text-green-800"><?php echo e($green_kpis); ?></div>
            </div>
            <!-- Kuning -->
            <div class="flex-1 min-w-[150px] bg-white rounded-xl shadow-lg p-4 flex flex-col items-center justify-center transform transition-transform hover:scale-105">
                <div class="w-6 h-6 rounded-full bg-yellow-500 mb-1"></div>
                <div class="text-md font-semibold text-yellow-800">Kuning</div>
                <div class="text-xl font-bold text-yellow-800"><?php echo e($yellow_kpis); ?></div>
            </div>
            <!-- Merah -->
            <div class="flex-1 min-w-[150px] bg-white rounded-xl shadow-lg p-4 flex flex-col items-center justify-center transform transition-transform hover:scale-105">
                <div class="w-6 h-6 rounded-full bg-red-500 mb-1"></div>
                <div class="text-md font-semibold text-red-800">Merah</div>
                <div class="text-xl font-bold text-red-800"><?php echo e($red_kpis); ?></div>
            </div>
        </div>
    </div>
    <div class="bg-white shadow rounded-lg overflow-hidden transition-all duration-300 hover:shadow-xl transform motion-safe:animate-fadeInUp mt-8" style="animation-delay: 400ms">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Daftar Indikator Kinerja</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Indikator</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Target</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Realisasi</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">% Realisasi</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Score/Max</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $__currentLoopData = $indikators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indikator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900"><?php echo e($indikator->nama_indikator); ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500 <?php if($indikator->target == 0): ?> bg-[repeating-linear-gradient(-45deg,theme(colors.white),theme(colors.white)_10px,theme(colors.gray.50)_10px,theme(colors.gray.50)_20px)] <?php endif; ?>">
                            <?php if($indikator->target == 0): ?>
                                <span class="text-gray-400 italic text-xs">—</span>
                            <?php else: ?>
                                <?php echo e(number_format($indikator->target)); ?>

                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?php echo e(number_format($indikator->realisasi)); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500 <?php if($indikator->target == 0): ?> bg-[repeating-linear-gradient(-45deg,theme(colors.white),theme(colors.white)_10px,theme(colors.gray.50)_10px,theme(colors.gray.50)_20px)] <?php endif; ?>">
                             <?php if($indikator->target == 0): ?>
                                <span class="text-gray-400 italic text-xs">—</span>
                            <?php else: ?>
                                <?php echo e(number_format($indikator->persen_realisasi, 2)); ?>%
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center <?php if($indikator->target == 0): ?> bg-[repeating-linear-gradient(-45deg,theme(colors.white),theme(colors.white)_10px,theme(colors.gray.50)_10px,theme(colors.gray.50)_20px)] <?php endif; ?>">
                            <?php if($indikator->target == 0): ?>
                                <span class="text-gray-400 italic text-xs">—</span>
                            <?php else: ?>
                                <?php
                                    $percentage = $indikator->target > 0 ? ($indikator->realisasi / $indikator->target) * 100 : 0;
                                    $score = round(($percentage / 100) * $indikator->max_score, 2);
                                    if ($percentage >= 100) {
                                        $color = 'bg-green-100 text-green-800';
                                    } elseif ($percentage >= 80) {
                                        $color = 'bg-yellow-100 text-yellow-800';
                                    } else {
                                        $color = 'bg-red-100 text-red-800';
                                    }
                                ?>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium <?php echo e($color); ?>">
                                    <?php echo e(number_format($score, 2)); ?>/<?php echo e(number_format($indikator->max_score, 2)); ?>

                                </span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    @keyframes wave {
        0%, 100% { transform: rotate(0deg); }
        25% { transform: rotate(-15deg); }
        75% { transform: rotate(15deg); }
    }
    .animate-wave {
        animation: wave 2s ease-in-out infinite;
        transform-origin: bottom center;
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/dashboardKinerja/resources/views/pegawai/dashboard.blade.php ENDPATH**/ ?>