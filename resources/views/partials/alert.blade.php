<?php
/**
 * Alert Card
 * @var string $type (success, danger, warning, info)
 * @var string $message
 */
if (isset($type) && $type === 'success') {
    $bg_color   = 'green lighten-2';
    $text_color = 'green-text text-darken-3';
}
elseif (isset($type) && $type === 'danger') {
    $bg_color   = 'red lighten-1';
    $text_color = 'red-text text-darken-4';
}
elseif (isset($type) && $type === 'warning') {
    $bg_color   = 'orange darken-2';
    $text_color = 'orange-text text-darken-4';
}
elseif (isset($type) && $type === 'info') {
    $bg_color   = 'light-blue lighten-1';
    $text_color = 'light-blue-text text-darken-4';
}
else {
    $bg_color   = 'grey lighten-2';
    $text_color = 'grey-text text-darken-2';
}
?>
<div class="card alert {{ $bg_color }}">
    <div class="card-content">
        <i class="material-icons alert-close white-text">close</i>
        <span class="{{ $text_color }}">{{ $message }}</span>
    </div>
</div>

{{-- @Note: The Javascript to close alert found in master template --}}