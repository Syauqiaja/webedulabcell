@props(['activeMaterial' => null, 'testType' => null, 'activity' => null])
@php
$tests = [];
$isCompleted = [];
$classes = [];
foreach (\App\Livewire\Activities\TestType::cases() as $type) {
  if($type == \App\Livewire\Activities\TestType::UNDEFINED) continue;
  
  $tests[$type->value] = $activity->tests($type)->first();
  $isCompleted[$type->value] = $tests[$type->value]->isCompleted();

  if($isCompleted[$type->value]){
    $classes[$type->value] = "btn btn-success";
  }else{
    $classes[$type->value] = $testType == $type->value ? 'btn btn-secondary' : 'btn btn-outline-secondary';
  }
}
@endphp
<nav id="sidebarMenu" class="sidebar bg-white p-3">
  <div class="d-flex justify-content-between align-items-center">
    <!-- Desktop Header -->
    <span class="fs-5 fw-semibold d-none d-md-block">Daftar Modul {{ $activity->id }}</span>
    <!-- Mobile Header with Close Button -->
    <div class="d-md-none w-100 d-flex justify-content-between align-items-center">
      <span class="fs-5 fw-semibold">Daftar Modul {{ $activity->id }}</span>
      <button class="btn btn-sm btn-outline-secondary" id="sidebarCloseBtn" aria-label="Close sidebar">
        <i class="bi bi-x fs-5"></i>
      </button>
    </div>
  </div>
  <hr>
  <!-- Materials Navigation -->
  <ul class="nav nav-pills mb-auto flex-column">
    <li class="nav-item d-flex flex-column mb-4">
      <a class="{{ $classes[\App\Livewire\Activities\TestType::PRETEST->value] }}" aria-current="page"
        href="{{ route('activities.test', ['id' => $activity->id, 'type' => \App\Livewire\Activities\TestType::PRETEST]) }}">
        <i class="bi bi-file-earmark-medical"></i> Pre-Test
      </a>
    </li>
    @foreach ($activity->materials as $key => $material)
    <x-detail-activity-navitem :key="$key" :material="$material" :isActive="$material->userProgress != null"
      :isSelected="$material->id == $activeMaterial?->id" :activityId="$activity->id" />
    @endforeach
    <li class="nav-item d-flex flex-column mt-5">
      <a class="{{ $classes[\App\Livewire\Activities\TestType::LATSOL->value] }} {{ $activity->materials()->orderBy('order', 'desc')->first()->userProgress()->first()?->is_completed == true ? "" : "
        disabled" }}" aria-current="page"
        href="{{ route('activities.test', ['id' => $activity->id, 'type' => \App\Livewire\Activities\TestType::LATSOL]) }}">
        <i class="bi bi-file-earmark-medical"></i> Latihan Soal
      </a>
    </li>
    <li class="nav-item d-flex flex-column mt-2">
      <a class="{{ $classes[\App\Livewire\Activities\TestType::POSTTEST->value] }} {{ $activity->latsol->first()->isCompleted() ? '' : 'disabled' }}"
        aria-current="page"
        href="{{ route('activities.test', ['id' => $activity->id, 'type' => \App\Livewire\Activities\TestType::POSTTEST]) }}">
        <i class="bi bi-file-earmark-medical"></i> Post-Test
      </a>
    </li>
  </ul>
  <hr>
</nav>