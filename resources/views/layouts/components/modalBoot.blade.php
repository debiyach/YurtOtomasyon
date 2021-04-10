<div class="modal fade" id="@yield('modalId')" tabindex="-1" aria-labelledby="@yield('modalId')Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="@yield('modalId')Label">@yield('modalTitle','Form')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @yield('modalContent')
        </div>
    </div>
</div>
