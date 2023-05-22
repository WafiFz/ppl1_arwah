<footer class="flex justify-between p-4 text-sm footer">
    <div>
        <a href="/">{{app_name()}}</a>.
        @if(setting('show_copyright'))
        @lang('Copyright') &copy; {{ date('Y') }}
        @endif
    </div>
</footer>