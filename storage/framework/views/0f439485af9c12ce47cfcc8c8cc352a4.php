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
    $totalKpi = $indikators->sum(fn($i) => $i->kpi_score['nilai']);
    $avgKpi = count($indikators) > 0 ? round($totalKpi / count($indikators), 1) : 0;
    $green_kpis = $indikators->filter(fn($i) => $i->kpi_score['warna'] == 'bg-success')->count();
    $yellow_kpis = $indikators->filter(fn($i) => $i->kpi_score['warna'] == 'bg-warning')->count();
    $red_kpis = $indikators->filter(fn($i) => $i->kpi_score['warna'] == 'bg-danger')->count();

    $max_possible_score = $indikators->sum('max_score');
    $percentage = $max_possible_score > 0 ? ($total_score / $max_possible_score) * 100 : 0;

    if ($percentage >= 100) {
        $score_color = 'text-green-800';
    } elseif ($percentage >= 80) {
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
            <!-- Total Realisasi -->
            <div class="p-4 rounded-xl text-white shadow-lg bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-between min-h-[100px] transform transition-transform hover:scale-105">
                <div>
                    <span class="text-2xl font-bold"><?php echo e(number_format($indikators->sum('realisasi'))); ?></span>
                    <p class="text-sm font-medium">Total Realisasi</p>
                </div>
                <div class="opacity-30">
                    <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
            </div>
            <!-- Rata-rata KPI -->
            <div class="p-4 rounded-xl text-white shadow-lg bg-gradient-to-br from-amber-400 to-yellow-500 flex items-center justify-between min-h-[100px] transform transition-transform hover:scale-105">
                <div>
                    <span class="text-2xl font-bold"><?php echo e($avgKpi); ?></span>
                    <p class="text-sm font-medium">Rata-rata KPI</p>
                </div>
                <div class="opacity-30">
                    <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
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
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?php echo e(number_format($indikator->target)); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?php echo e(number_format($indikator->realisasi)); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?php echo e(number_format($indikator->persen_realisasi, 2)); ?>%
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
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
                                <?php echo e($score); ?>/<?php echo e($indikator->max_score); ?>

                            </span>
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