
<div x-show="!isExpanded">
    <i @click="isExpanded = true" class="fas fa-angle-double-down text-gray-800 text-lg"></i>
</div>

<div x-show="isExpanded">
    <i @click="isExpanded = false" class="fas fa-angle-double-up text-red-900 text-lg"></i>
</div>