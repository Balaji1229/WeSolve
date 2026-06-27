{{-- Generic live char counters. Add anywhere:
     <span data-counter-for="meta_title" data-min="50" data-max="60"></span>
     It binds to the input/textarea with that id and shows count + range state. --}}
@push('scripts')
<script>
(function () {
    document.querySelectorAll('[data-counter-for]').forEach(function (el) {
        const field = document.getElementById(el.dataset.counterFor);
        if (!field) return;
        const min = parseInt(el.dataset.min || '0', 10);
        const max = parseInt(el.dataset.max || '0', 10);

        function update() {
            const len = field.value.length;
            let state = 'ok';
            if (len < min) state = 'low';
            else if (max && len > max) state = 'high';
            el.textContent = len + (max ? ' / ' + max : '') + ' chars'
                + (state === 'low' ? ' — too short' : state === 'high' ? ' — too long' : ' ✓');
            el.style.color = state === 'ok' ? '#22c55e' : (state === 'high' ? '#ef4444' : '#f59e0b');
        }
        field.addEventListener('input', update);
        update();
    });
})();
</script>
@endpush
