@props(['id', 'title', 'header' => 'true', 'closable' => 'true', 'placement' => 'center', 'backdrop' => 'dynamic', 'backdropClasses' => 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40'])

<div id="{{ $id }}" tabindex="-1" aria-hidden="false" x-data="data{{ $id }}()" x-init="console.log(modalID);" class="fixed z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            @if ($header == "true")
                <div class="flex items-start justify-between p-4 border-b border-gray-300 rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-black dark:text-white">
                        {{ $title }}
                    </h3>
                    <button @click="hide()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
            @endif
            {{ $slot }}
        </div>
    </div>
</div>

@push('before-scripts')
    <script>
        function data{{ $id }}() {
            return { 
                modalID: '{{ $id }}', 
                toggle(){ {{ $id }}.toggle();},
                show(){ {{ $id }}.show();},
                hide(){ {{ $id }}.hide();} 
            }
        }
        // set the modal menu element
        var targetEl = document.getElementById('{{ $id }}');

        // options with default values
        var options = {
            placement: '{{ $placement }}',
            backdrop: '{{ $backdrop }}',
            backdropClasses: '{{ $backdropClasses }}',
            closable: {{ $closable }},
            onHide: () => {
                console.log('{{ $id }} is hidden');
            },
            onShow: () => {
                console.log('{{ $id }} is shown');
            },
            onToggle: () => {
                console.log('{{ $id }} has been toggled');
            }
        };

        const {{ $id }} = new Modal(targetEl, options);
    </script>
@endpush