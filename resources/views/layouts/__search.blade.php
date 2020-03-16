<form action="{{ route('invoices.index') }}" method="get" class="form-inline pull-right">
    <div class="input-group input-group-sm">
        <input type="search" name="search" id="search" value="{{ Request::get('search') }}" placeholder="{{ __('Client id') }}" class="form-control form-control-sm" aria-label="Search">
        <div class="input-group-append">
            <button class="input-group-text" type="submit">
                <span class="glyphicon glyphicon-search"></span>
                <i aria-hidden="true" class="fas fa-fw fa-search"></i>
            </button>
        </div>
    </div>
</form>